<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<%'�H�����D�بÿ�X��XML%>
<!--#include file="connectDB.asp"-->
<%
Response.Expires=-1500
Response.CacheControl="no-cache"
'�T��֨�
id=request("id")
set rs=server.CreateObject("ADODB.Recordset")
if id="" then
'�Y�S�a�ѼƹL�ӫK�üƨ��@��record
 sql="select * from Employees ORDER BY NEWID()"
else
 '���ĤT��record
 sql="select * from Employees where EmployeeID="&id
end if
rs.Open sql , conn , 3 , 1
Response.ContentType="text/xml"
'�N���s�X���w��XML�榡�Aasp����xml�榡�ɥ��[
response.write "<?xml version="&chr(34)&"1.0"&chr(34)&" encoding="&chr(34)&"utf-8"&chr(34)&"?>"
response.write "<areas>"
response.write "<id>"&rs("EmployeeID")&"</id>"
response.write "<name>"&rs("FirstName")&"</name>"
response.write "<address>"&rs("Address")&"</address>"
response.write "</areas>"
rs.close
%>