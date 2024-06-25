@echo off
cd "c:\program files\mysql\mysql server 8.0\bin"
mysqldump -u root -p --no-data sportfit > C:\xampp\htdocs\SportFit\SQL\sportfit_sin_datos.sql
