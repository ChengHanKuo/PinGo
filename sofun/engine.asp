<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<%'隨機選題目並輸出為XML%>
<!--#include file="connectDB.asp"-->
<%
Response.Expires=-1500
Response.CacheControl="no-cache"
'禁止快取
id=request("id")
set rs=server.CreateObject("ADODB.Recordset")
if id="" then
'若沒帶參數過來便亂數取一筆record
 sql="select * from Employees ORDER BY NEWID()"
else
 '取第三筆record
 sql="select * from Employees where EmployeeID="&id
end if
rs.Open sql , conn , 3 , 1
Response.ContentType="text/xml"
'將文件編碼指定為XML格式，asp產生xml格式時必加
response.write "<?xml version="&chr(34)&"1.0"&chr(34)&" encoding="&chr(34)&"utf-8"&chr(34)&"?>"
response.write "<areas>"
response.write "<id>"&rs("EmployeeID")&"</id>"
response.write "<name>"&rs("FirstName")&"</name>"
response.write "<address>"&rs("Address")&"</address>"
response.write "</areas>"
rs.close
%>