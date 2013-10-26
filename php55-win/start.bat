@ECHO OFF
start http://localhost:8081/phpinfo.php
SET root=%1
if "%root%"=="" (
	SET root=%~d0%~p0www
)
"%~d0%~p0php" -S 0.0.0.0:8081 -t "%root%"
REM x86 http://www.microsoft.com/download/en/details.aspx?id=5582
REM x64 http://www.microsoft.com/download/en/details.aspx?id=15336
