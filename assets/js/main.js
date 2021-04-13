$(document).ready(() => {
    $('#contactForm').submit(function(e) {

        var $btn = $(this).find('button[type=submit]');
        var loadingText = '<i class="fa fa-spinner fa-spin"></i> enviando...';
    
        $btn.data('original-text', $btn.html());
        $btn.html(loadingText);
    
        console.log('cheguei aqui')
        $.ajax({
    
            type: "POST",
            url: "email.php",
            data: $('#contactForm').serialize(),
            success: function(data) {
                data = JSON.parse(data)
                console.log(data.success)
                if (!data.success) {
                    $btn.html($btn.data('original-text'));
                    $("#contactForm")[0].reset();
                    $('#msgSubmit').html(data.error).fadeIn(2000).fadeOut(4000);
                } else {
                    $btn.html($btn.data('original-text'));
                    $("#contactForm")[0].reset();
                    $('#msgSubmit').html('<p>' + data.posted + '</p>').fadeIn(2000).fadeOut(4000);
                }
            }
        });
        e.preventDefault();
    });
    
    $('#dataTable').DataTable({
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_  resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            }
        }
    });

    $('#confirmModal').on('show.bs.modal', function(e) {                
        console.log($(e.relatedTarget).data('id-action'));

        $('#form-delete').attr('action', $(e.relatedTarget).data('id-action'));
    });

    $('#form-delete').submit((e) => {   
        console.log('cheguei aq');
        
        $.post($(this).attr('action'));

    });

});

var getDataHome = () => {
    $.ajax({            
        type: "POST",
        url: 'home.php',
        success: function(data) {
            data = JSON.parse(data)
            console.log(data.success);
            console.log(data.sellers);

            chartBars(data.sellers);
            chartLines(data.week);
        }
    });
}

var chartBars = (sellers) => {
    
    let lbSellers = [];
    let lbQtd = [];

    sellers.forEach((seller) => {
        lbSellers.push(seller.name);
        lbQtd.push(seller.qtd);
    });

    var ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: lbSellers,
            datasets: [{
                label: 'Quantidade de Vendas por Vendedor',
                data: lbQtd,
                backgroundColor: [
                    '#213F70',
                    '#2789e6',
                    '#4687F0',
                    '#113570',
                    '#376ABD',
                ]
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
};

var chartLines = (days) => {
    
    let lbDays = [];
    let lbQtd = [];

    days.forEach((day) => {
        lbDays.push(day.sale_date);
        lbQtd.push(day.qtd);
        console.log(day);
    });

    new Chart(document.getElementById("chart-week"), {
        type: 'line',        
        data: {
            labels: lbDays,
            datasets: [{
                label: 'Quantidade de Vendas por Dia na Semana',
                data: lbQtd,
                fill: false,
                borderColor: '#f00843',
                tension: 0.2
            }]
        }
    });
};