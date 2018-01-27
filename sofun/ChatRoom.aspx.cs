using System;
using System.Collections;
using System.ComponentModel;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Web;
using System.Web.Security;
using System.Web.SessionState;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls;
using AjaxPro;

namespace ch81
{
	/// <summary>
	/// ChatRoom 的摘要說明。
	/// </summary>
	public partial class ChatRoom : System.Web.UI.Page
	{
		
		protected void Page_Load(object sender, System.EventArgs e)
		{
			//註冊Ajax類型
			Utility.RegisterTypeForAjax(typeof(ChatRoom));
		}

		#region Web 表單設計器生成的代碼
		override protected void OnInit(EventArgs e)
		{
			//
			// CODEGEN: 該調用是 ASP.NET Web 表單設計器所必需的。
			//
			InitializeComponent();
			base.OnInit(e);
		}
		
		/// <summary>
		/// 設計器支援所需的方法 - 不要使用代碼編輯器修改
		/// 此方法的內容。
		/// </summary>
		private void InitializeComponent()
		{    

		}
		#endregion

		public string UserName
		{
			get
			{
				return User.Identity.Name;
			}
		}

		/// <summary>
		/// 獲取新消息的html字串
		/// </summary>
		/// <returns>用戶端輸出的html字串</returns>
		[AjaxMethod()]
		public string GetNewMsgString()
		{
			string strMsgHTML = "";

			SqlConnection conn = new SqlConnection(
				ConfigurationSettings.AppSettings["ConnectionString"]);

			SqlCommand cmd = conn.CreateCommand();
			cmd.CommandType = CommandType.StoredProcedure;
			cmd.CommandText = "GetNewMsg";
			cmd.Parameters.Add("@username", UserName);
            
			conn.Open();
			using (SqlDataReader dr = cmd.ExecuteReader())
			{
				while (dr.Read())
				{
					if (dr.GetString(1) != "")
					{
						strMsgHTML += string.Format(
							"<span class='chatmsg' style='COLOR: #{0}'>{1}&nbsp;{2}&nbsp;{3}&nbsp;{4}&nbsp;>>&nbsp;{5}</span><br>",
							dr.GetString(5),
							dr.GetString(1),
							TestIsPublic(dr.GetBoolean(6)),
							TestYourself(dr.GetString(2)),
							dr.GetString(4),
							Replace_GTLT(dr.GetString(3)));
					}
					else
					{
						strMsgHTML += string.Format(
							"<span class='chatmsg' style='COLOR: #{0}'>{1}</span><br>",
							dr.GetString(5),
							dr.GetString(3));
					}
				}
			}
			conn.Close();

			SetMsgPos();
			
			return strMsgHTML;
		}

		/// <summary>
		/// 替換字串中的'<','>'字元
		/// </summary>
		/// <param name="strInput">輸入字串</param>
		/// <returns>替換後的字串</returns>
		private string Replace_GTLT(string strInput)
		{
			string strOutput = strInput.Replace("<", "&lt;");
			strOutput = strOutput.Replace(">", "&gt;");
			return strOutput;
		}

		/// <summary>
		/// 檢查用戶名是否是當前登錄的用戶名
		/// </summary>
		/// <param name="strInput">用戶名</param>
		/// <returns>經過替換的用戶名</returns>
		private string TestYourself(string strInput)
		{
			if (strInput == UserName)
				return "你";
			else
				return strInput;
		}

		private string TestIsPublic(bool IsPublic)
		{
			if (IsPublic)
				return "對";
			else
				return "悄悄地對";
		}

		/// <summary>
		/// 記錄已經閱讀過的消息id
		/// </summary>
		private void SetMsgPos()
		{
			SqlConnection conn = new SqlConnection(
				ConfigurationSettings.AppSettings["ConnectionString"]);
			SqlCommand cmd = conn.CreateCommand();
			cmd.CommandType = CommandType.StoredProcedure;
			cmd.CommandText = "SetMsgPos";
			cmd.Parameters.Add("@username", UserName);
            
			conn.Open();

			cmd.ExecuteNonQuery();

			conn.Close();
		}

		[AjaxMethod()]
		public void SendMsg(string strMsg, string strUserTo, string strColor, string strExpression, bool bIsPublic)
		{
			SqlConnection conn = new SqlConnection(
				ConfigurationSettings.AppSettings["ConnectionString"]);

			SqlCommand cmd = conn.CreateCommand();
			cmd.CommandType = CommandType.StoredProcedure;
			cmd.CommandText = "SendMsg";
			cmd.Parameters.Add("@user_from", UserName);
			cmd.Parameters.Add("@user_to", strUserTo);
			cmd.Parameters.Add("@content", strMsg);
			cmd.Parameters.Add("@expression", strExpression);
			cmd.Parameters.Add("@color", strColor);
			cmd.Parameters.Add("@ispublic", bIsPublic);

			conn.Open();
			cmd.ExecuteNonQuery();
			conn.Close();
		}

		[AjaxMethod()]
		public string GetOnlineUserString()
		{
			string strUserlist = "";

			SqlConnection conn = new SqlConnection(
				ConfigurationSettings.AppSettings["ConnectionString"]);

			SqlCommand cmd = conn.CreateCommand();
			cmd.CommandType = CommandType.StoredProcedure;
			cmd.CommandText = "GetOnlineUsers";
            
			conn.Open();
			using (SqlDataReader dr = cmd.ExecuteReader())
			{
				while (dr.Read())
				{
					strUserlist += dr.GetString(1) + ",";
				}
			}
			conn.Close();
			return strUserlist.TrimEnd(',');	
		}

		[AjaxMethod()]
		public void Logout()
		{
			SqlConnection conn = new SqlConnection(
				ConfigurationSettings.AppSettings["ConnectionString"]);

			SqlCommand cmd = conn.CreateCommand();
			cmd.CommandType = CommandType.StoredProcedure;
			cmd.CommandText = "UserLogout";
			cmd.Parameters.Add("@username", UserName);

			conn.Open();
			cmd.ExecuteNonQuery();
			conn.Close();

			//FormsAuthentication.SignOut();
			
		}

	}
}
