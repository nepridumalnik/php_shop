cd %~dp0../compose
copy ..\composer.json
docker-compose --env-file=../environment/config.env --file=ishop-services.yml up -d
del /Q composer.json
