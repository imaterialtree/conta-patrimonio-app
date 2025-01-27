import $ from 'jquery';
const readButton = $('#readButton');
const buttonText = $('#buttonText');
const buttonSpinner = $('#buttonSpinner');
let ndef;
let isScanning = false;
let scanController;

function initializeRFID() {
    if ('NDEFReader' in window) {
        ndef = new NDEFReader();
        readButton.show();
        return logMessage("Seu dispositivo suporta RFID");
    } else {
        readButton.hide();
        return logMessage("RFID não suportado neste dispositivo.");
    }
}

async function readTag() {
    if (isScanning) {
        logMessage("Cancelando leitura...");
        scanController.abort();
        isScanning = false;
        buttonText.removeClass('d-none');
        buttonSpinner.addClass('d-none');
        readButton.removeClass('scanning');
        return;
    }

    buttonText.addClass('d-none');
    buttonSpinner.removeClass('d-none');
    readButton.addClass('scanning');
    logMessage("Aguardando leitura...");
    isScanning = true;

    try {
        scanController = new AbortController();
        await ndef.scan({ signal: scanController.signal });
        ndef.onreading = event => {
            const { serialNumber } = event;
            logMessage(`Tag RFID detectada. Número de série da tag: ${serialNumber}`);

            var data = null;
            for (const record of event.message.records) {
                const textDecoder = new TextDecoder(record.encoding);
                data = textDecoder.decode(record.data);
                logMessage(`Tipo de dados: ${record.recordType}, Dados: ${data}`);
            }

            // Redirecionar para a página de mostrar informações do patrimônio
            window.location.href = `/comissao/patrimonios/show?codigo=${data}`;

            buttonText.removeClass('d-none');
            buttonSpinner.addClass('d-none');
            readButton.removeClass('scanning');
            isScanning = false;
        };
    } catch (error) {
        if (error.name === 'AbortError') {
            logMessage("Leitura cancelada.");
        } else {
            logMessage(`Erro ao tentar ler RFID: ${error}`);
        }
        buttonText.removeClass('d-none');
        buttonSpinner.addClass('d-none');
        readButton.removeClass('scanning');
        isScanning = false;
    }
}

function logMessage(msg) {
    console.log(msg);
    return msg;
}

initializeRFID();

document.getElementById('readButton').addEventListener('click', readTag);
