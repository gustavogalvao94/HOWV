# 🍬 HandWorkV - Site de Confeitaria

Este projeto foi desenvolvido como parte de uma atividade extensionista da faculdade, com o objetivo de auxiliar na profissionalização e divulgação dos serviços de uma chef especializada em doces para eventos.

## 📌 Apresentação do Negócio

**Nome do Negócio:** Doces Caramilados  

**Descrição:**  
O site visa facilitar a divulgação de serviços personalizados de confeitaria para festas e eventos. Atualmente, a profissional atua de forma informal, e o objetivo é utilizar o site como primeiro passo para uma transição para o trabalho oficial (com CNPJ e estrutura formalizada).

**Setor de Atuação:** Alimentação / Eventos  
**Problema Atendido:** Divulgação de produtos e contato facilitado com a confeiteira.  
**Público-alvo:** Pessoas interessadas em doces personalizados para eventos como aniversários, casamentos, festas corporativas etc.  
**Serviços:** Doces personalizados, bolos temáticos, kits festa.  
**Equipe:** Empreendimento individual com apoio técnico de estudantes para desenvolvimento da solução digital.

---

## 💻 Tecnologias Utilizadas

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Servidor Local:** PHP embutido (`php -S`)  
- **Banco de Dados:** MySQL   
- **Gerenciamento de Dependências:** Node.js (`package.json`)

---

## 🛠️ Estrutura e Configuração

- A aplicação possui um **setup inicial de banco de dados** no arquivo:

- A conexão com o banco **não exige alteração no código-fonte**. Basta configurar corretamente as variáveis de ambiente no servidor:
- `DB_HOST`
- `DB_NAME`
- `DB_USER`
- `DB_PASS`

Isso aumenta a **segurança**, evitando que credenciais sensíveis sejam expostas no repositório.

- Comandos úteis e scripts de manutenção estão definidos no `package.json`.

---

## 🔐 Segurança

- A **home do site é pública**, podendo ser acessada por qualquer visitante.
- Existe uma **validação de login** para acesso à área administrativa:
- A tela `login.html` garante que apenas usuários autenticados acessem `admin.php`.

---

## 📂 Telas da Aplicação

- `index.html`: página inicial pública, com informações da empresa e serviços.
- `login.html`: página de autenticação para acessar a área administrativa.
- `admin.php`: painel de gerenciamento interno dos produtos.
- `public/`: pasta onde os arquivos visíveis pelo navegador ficam hospedados.

---

## 📸 Evidências da Atividade Extensionista

Durante o desenvolvimento, foram aplicadas práticas de testes e conexão com banco de dados, auxiliando uma microempreendedora a dar seus primeiros passos no mundo digital.

---

## ✅ Pontos Positivos

- Primeira experiência prática desenvolvendo um site real.
- Aprendizado de PHP e integração com MySQL via código.
- Criação de estrutura base para setup automático do banco.
- Contato com deploy, segurança e uso de variáveis de ambiente.

## ⚠️ Pontos Negativos

- Sem uso de frameworks por restrição da disciplina, o que limitou o layout e deixou a aparência mais simples.
- Algumas melhorias de design e UX não foram possíveis no tempo proposto.

---

## 🧠 Conclusão

Foi uma experiência extremamente enriquecedora trabalhar em um projeto real com impacto social direto. Aprender a construir, testar e publicar um site com tecnologias básicas reforçou conhecimentos essenciais e mostrou o valor da tecnologia como agente transformador.

---


