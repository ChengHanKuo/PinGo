using System.Reflection;
using System.Runtime.CompilerServices;

//
// 有關程式集的常規資訊是通過下列
// 屬性集控制的。更改這些屬性值可修改與程式集
// 關聯的資訊。
//
[assembly: AssemblyTitle("")]
[assembly: AssemblyDescription("")]
[assembly: AssemblyConfiguration("")]
[assembly: AssemblyCompany("")]
[assembly: AssemblyProduct("")]
[assembly: AssemblyCopyright("")]
[assembly: AssemblyTrademark("")]
[assembly: AssemblyCulture("")]		

//
// 程式集的版本資訊由下列 4 個值組成:
//
//      主版本
//      次版本 
//      內部版本號
//      修訂號
//
// 您可以指定所有這些值，也可以使用“修訂號”和“內部版本號”的預設值，方法是按
// 如下所示使用 '*':

[assembly: AssemblyVersion("1.0.*")]

//
// 要對程式集進行簽名，必須指定要使用的密鑰。有關程式集簽名的更多資訊，請參考
// Microsoft .NET Framework 文檔。
//
// 使用下面的屬性控制用於簽名的密鑰。
//
// 注意: 
//   (*) 如果未指定密鑰，則程式集不會被簽名。
//   (*) KeyName 是指已經安裝在
//       電腦上的加密服務提供程式(CSP)中的密鑰。KeyFile 是指包含
//       密鑰的文件。
//   (*) 如果 KeyFile 和 KeyName 值都已指定，則
//       發生下面的處理: 
//       (1) 如果在 CSP 中可以找到 KeyName，則使用該密鑰。
//       (2) 如果 KeyName 不存在而 KeyFile 存在，則 
//           KeyFile 中的密鑰安裝到 CSP 中並且使用該密鑰。
//   (*) 要創建 KeyFile，可以使用 sn.exe(強名稱)實用工具。
//        在指定 KeyFile 時，KeyFile 的位置應該
//        相對於“專案輸出目錄”。項目輸出
//        目錄的位置取決於您是在使用本地專案還是 Web 專案。
//        對於本地專案，專案輸出目錄定義為
//       <Project Directory>\obj\<Configuration>。例如，如果 KeyFile 位於該
//       專案目錄中，應將 AssemblyKeyFile 
//       屬性指定為 [assembly: AssemblyKeyFile("..\\..\\mykey.snk")]
//        對於 Web 專案，專案輸出目錄定義為
//       %HOMEPATH%\VSWebCache\<Machine Name>\<Project Directory>\obj\<Configuration>。
//   (*) “延遲簽名”是一個高級選項 - 有關它的更多資訊，請參閱 Microsoft .NET Framework
//       文檔。
//
[assembly: AssemblyDelaySign(false)]
[assembly: AssemblyKeyFile("")]
[assembly: AssemblyKeyName("")]
