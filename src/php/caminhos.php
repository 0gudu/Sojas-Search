<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <form id="formInserir" class="bg-white p-4 rounded">
            <h3 class="mb-4">Formulário de Inserção</h3>
            <div class="mb-3">
                <label for="caminho" class="form-label">Selecione o arquivo</label>
                <input type="text" name="caminho" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Insira o nome do banco de dados</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <button type="button" id="btnEnviar" class="btn btn-primary">Enviar</button>
        </form>
        <div id="mensagem"></div>
    </div>

    <!-- Include Bootstrap JavaScript and Popper.js (place these before the closing </body> tag) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-b4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyEOU8bHs3t9T5O8xWIrUZhQK1OeANth9y"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-pzjw8a+tpfWTZI6qPPTfiu6Ij0d8f6GltTUQd2I8Njds3+q0F2FflJ66cuutL3tx"
        crossorigin="anonymous"></script>
        <script>
    $(document).ready(function () {
        $("#btnEnviar").click(function () {
            var form = $("#formInserir")[0];
            var formData = new FormData(form);

            // Iniciar a animação de enviando
            var mensagem = $("#mensagem");
            var animacao = setInterval(function () {
                if (mensagem.text().length < 20) {
                    mensagem.text(mensagem.text() + ".");
                } else {
                    mensagem.text("Enviando");
                }
            }, 500);

            $.ajax({
                url: "scripts/inserir.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    clearInterval(animacao);
                    mensagem.text("Concluído");
                },
                error: function (error) {
                    console.log("Erro:", error);
                    clearInterval(animacao);
                    mensagem.text("Erro ao enviar.");
                    $("#progresso").hide();
                }
            });
        });
    });
</script>
</body>
</html>
