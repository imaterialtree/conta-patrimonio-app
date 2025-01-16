param(
    [Parameter(Mandatory = $true, HelpMessage = "Informe o nome do ambiente.")]
    [string]$envName
)

# Define a variável de ambiente APP_ENV
$env:APP_ENV = $envName

# Opcional: Limpa o cache de configuração do Laravel
php artisan config:clear

# Exibe uma mensagem de confirmação
Write-Host "A variável APP_ENV foi definida como '$env:APP_ENV' e o cache de configuração foi limpo." -ForegroundColor Green
