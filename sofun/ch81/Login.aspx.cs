//===========================================================================
// This file was modified as part of an ASP.NET 2.0 Web project conversion.
// The class name was changed and the class modified to inherit from the abstract base class 
// in file 'App_Code\Migrated\Stub_Login_aspx_cs.cs'.
// During runtime, this allows other classes in your web application to bind and access 
// the code-behind page using the abstract base class.
// The associated content page 'Login.aspx' was also modified to refer to the new class name.
// For more information on this code pattern, please refer to http://go.microsoft.com/fwlink/?LinkId=46995 
//===========================================================================
using System;
using System.Collections;
using System.ComponentModel;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Web;
using System.Web.SessionState;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls;
using System.Web.Security;

namespace ch81
{
	/// <summary>
	/// Login 的摘要說明。
	/// </summary>
	public partial class Migrated_Login : Login
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此處放置用戶代碼以初始化頁面
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

		protected void LoginCustomControl1_Login(object sender, System.EventArgs e)
		{
			int iRet = -1;
			SqlConnection conn = new SqlConnection(
				ConfigurationSettings.AppSettings["ConnectionString"]);

			SqlCommand cmd = conn.CreateCommand();
			cmd.CommandType = CommandType.StoredProcedure;
			cmd.CommandText = "UserLogin";
			cmd.Parameters.Add("@username", LoginCustomControl1.UserName);
			cmd.Parameters.Add("@password", LoginCustomControl1.Password);

			//存儲過程返回值
			SqlParameter paramOut = cmd.Parameters.Add("@RETURN_VALUE", "");
			paramOut.Direction = ParameterDirection.ReturnValue;
            
			conn.Open();
			cmd.ExecuteNonQuery();
			conn.Close();			
			iRet = (int)cmd.Parameters["@RETURN_VALUE"].Value;

			if (iRet == 0) //登錄成功
			{
				FormsAuthentication.RedirectFromLoginPage(
					LoginCustomControl1.UserName, false);
			}
			else if (iRet == 1) //密碼不正確
			{
				Response.Write("<script>alert('密碼不正確')</script>");
			}
			else if (iRet == 2) //新註冊用戶
			{
				FormsAuthentication.RedirectFromLoginPage(
					LoginCustomControl1.UserName, false);
			}
		}
	}
}
