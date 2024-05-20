// document.addEventListener("DOMContentLoaded", function() {
//     function carregarJSON(url) {
//         return fetch(url)
//             .then(response => {
//                 if (!response.ok) {
//                     throw new Error(`Erro ao carregar o arquivo JSON: ${response.statusText}`);
//                 }
//                 return response.json();
//             });
//     }

//     function adicionarOpcoesNoSelect(opcoes, selectElement) {
//         Object.values(opcoes).forEach(opcao => {
//             const optionElement = document.createElement("option");
//             optionElement.value = opcao;
//             optionElement.textContent = opcao.pais;
//             selectElement.appendChild(optionElement);
//         });
//     }

//     const urlJSON = whatsIconVars.pluginUrl + '/json/paises.json';
//     const selectElement = document.getElementById('whats_icon_ddi');
// console.log('✌️selectElement --->', selectElement);

//     carregarJSON(urlJSON)
//         .then(data => {
//             const opcoes = data;
//             adicionarOpcoesNoSelect(opcoes, selectElement);
//         })
//         .catch(error => {
//             console.error('Erro:', error);
//         });
    
// });
