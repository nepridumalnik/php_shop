cd %~dp0../compose
copy ..\composer.json
docker-compose --file=ishop-services.yml up -d
del /Q composer.json
