<div>
    <h2>Downloads:</h2>
    <p>
        Download do código fonte: <a href="http://clubefutebol.hol.es/ClubeFutebol.zip">http://clubefutebol.hol.es/ClubeFutebol.zip</a>
    </p>
    <p>
        Download do SQL: <a href="http://clubefutebol.hol.es/cbsql.zip"> http://clubefutebol.hol.es/cbsql.zip </a>
    </p>
    <h2>Sistema:</h2>
    <ul>
        <li class="margin">Para <span class="negrito">cadastrar</span> um <span class="negrito">Clube</span>, clique em Cadastrar Clube no menu, digite o nome e clique em enviar.</li>
        <li class="margin">Para <span class="negrito">cadastrar</span> um <span class="negrito">Sócio</span>, clique em Cadastrar Sócio no menu, digite o nome, sobrenome, escolha no minimo um clube e clique em enviar.
            <ul>
                <li>Clique em "<span class="verde">+ Clube</span>" para adicionar mais de um clube para um único sócio.</li>
                <li>Clique em "<span class="laranja">- Clube</span>" para retira o campo de Clube (mínimo de um).</li>
                <li><span class="atencao">Atenção:</span>Caso você escolha 2 ou mais do mesmo clube, o sistema cadastrará apenas uma cópia.</li>
            </ul>
        </li>
        <li class="margin">Para <span class="negrito">listar</span> os <span class="negrito">Clubes</span> clique em "Listar Clubes".
            <ul>
                <li>Clique no "Nº" ou "Nome do Clube" para ordenar a lista.</li>
                <li><span class="negrito">Editar</span> um clube, clique no ícone <span class="glyphicon glyphicon-edit"></span> de um clube.
                    <ul>
                        <li>Após clicar no ícone o sistema mostrará o ID que será alterado, escolha um novo nome e clique em enviar.</li>
                    </ul>
                </li>
                <li><span class="negrito">Deletar</span> clique no ícone <span class="glyphicon glyphicon-remove"></span>, uma mensagem de confirmação aparecera.</li>
            </ul>
        </li>
        <li class="margin">Para <span class="negrito">listar</span> os <span class="negrito">Sócios</span> clique em "Listar Sócios".
            <ul>
                <li>Clique no "Nº", "Nome do Sócio" ou "Sobrenome" para ordenar a lista.</li>
                <li><span class="negrito">Editar</span> um sócio, clique no ícone <span class="glyphicon glyphicon-edit"></span> de um sócio.
                    <ul>
                        <li>Após clicar no ícone o sistema mostrará o ID que será alterado, escolha um novo nome ou sobrenome</li>
                        <li>Escolha um outro ou mais clubes para o sócio fazer parte caso necessário, <span class="negrito">NÃO</span> esqueça de desmarcar o checkbox para salvar as alterações de adicionar clubes.
                            <ul>
                                <li>Checkbox esse criado por questões de otimização, não é sempre necessário efetuar um update em clubes de sócios (tabela clube_socio no banco).
                            </ul>
                        </li>
                        <li><span class="negrito">Excluir</span> clube do sócio, clique no ícone <span class="glyphicon glyphicon-remove"></span>.</li>
                    </ul>
                </li>
                <li>Para apenas <span class="negrito">listar</span> os clubes vinculados à determinado sócio, clique no ícone <span class="glyphicon glyphicon-home">.</span></li>
            </ul>
        </li>
    </ul>
    <h2>Usabilidade:</h2>
    <p>
        O menu agrupa as ações por blocos, informações primeiro, seguido cadastrar e por fim ações de listar.<br/>
        Assim como nas ações em geral do sistema, informações da esquerda para direita, seguido por editar e por último na extrema direita ações de excluir. 
        Para um melhor aproveitamento do usuário, o sistema conta com um máximo de 3 cliques para efetuar qualquer ação necessária no sistema.<br/>
        Os botões de "enviar formulários" são uniforme no sistema, sempre em azul ao lado direito dos elementos em sua linha.<br/>
        Os botões de "ação positivas", como "adicionar clube" estão sempre em verde ao lado esquerdo dos elementos na sua linha.<br/>
        Os botões de "ação de destruição" são de cores laranjas para chamar atenção do usuário e não cometer erros clicando sem necessidade.<br/>
        As tabelas são listradas para que usuário não confunda as informações que está lendo na linha desejada.        
    </p>
</div>
