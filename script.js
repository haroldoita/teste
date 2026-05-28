// Recupera movimentações do LocalStorage
let movimentacoes =
JSON.parse(localStorage.getItem("movimentacoes")) || [];

// Função salvar movimentação
function salvarMovimentacao() {

    // Captura tipo
    let tipo =
    document.getElementById("tipo").value;

    // Captura descrição
    let descricao =
    document.getElementById("descricao").value;

    // Captura valor
    let valor =
    document.getElementById("valor").value;

    // Captura data
    let data =
    document.getElementById("data").value;

    // Verifica campos vazios
    if (
        tipo === "" ||
        descricao === "" ||
        valor === "" ||
        data === ""
    ) {

        // Exibe alerta
        alert("Preencha todos os campos!");

        // Encerra função
        return;
    }

    // Cria objeto movimentação
    let movimentacao = {

        // Tipo
        tipo,

        // Descrição
        descricao,

        // Valor convertido
        valor: parseFloat(valor),

        // Data
        data

    };

    // Adiciona movimentação
    movimentacoes.push(movimentacao);

    // Salva LocalStorage
    localStorage.setItem(
        "movimentacoes",
        JSON.stringify(movimentacoes)
    );

    // Mensagem
    alert("Movimentação salva!");

    // Limpa campos
    limparCampos();
}

// Função carregar tabela
function carregarTabela() {

    // Captura tabela
    let tabela =
    document.getElementById("tabelaMovimentacoes");

    // Se não existir tabela
    if (!tabela) return;

    // Limpa tabela
    tabela.innerHTML = "";

    // Total receitas
    let totalReceitas = 0;

    // Total despesas
    let totalDespesas = 0;

    // Percorre movimentações
    movimentacoes.forEach((mov, index) => {

        // Se receita
        if (mov.tipo === "receita") {

            // Soma receita
            totalReceitas += mov.valor;

        } else {

            // Soma despesa
            totalDespesas += mov.valor;

        }

        // Adiciona linha tabela
        tabela.innerHTML += `

        <tr>

            <td class="${mov.tipo}">
                ${mov.tipo}
            </td>

            <td>
                ${mov.descricao}
            </td>

            <td>
                R$ ${mov.valor.toFixed(2)}
            </td>

            <td>
                ${mov.data}
            </td>

            <td>

                <button onclick="excluir(${index})">
                    Excluir
                </button>

            </td>

        </tr>

        `;
    });

    // Atualiza receitas
    document.getElementById("receitas").innerHTML =
    `Receitas: R$ ${totalReceitas.toFixed(2)}`;

    // Atualiza despesas
    document.getElementById("despesas").innerHTML =
    `Despesas: R$ ${totalDespesas.toFixed(2)}`;

    // Atualiza saldo
    document.getElementById("saldo").innerHTML =
    `Saldo: R$ ${(totalReceitas - totalDespesas).toFixed(2)}`;
}

// Função excluir
function excluir(index) {

    // Confirma exclusão
    if (confirm("Deseja excluir?")) {

        // Remove item
        movimentacoes.splice(index, 1);

        // Atualiza LocalStorage
        localStorage.setItem(
            "movimentacoes",
            JSON.stringify(movimentacoes)
        );

        // Recarrega tabela
        carregarTabela();
    }
}

// Função limpar campos
function limparCampos() {

    // Limpa tipo
    document.getElementById("tipo").value = "";

    // Limpa descrição
    document.getElementById("descricao").value = "";

    // Limpa valor
    document.getElementById("valor").value = "";

    // Limpa data
    document.getElementById("data").value = "";
}

// Carrega tabela automaticamente
carregarTabela();
