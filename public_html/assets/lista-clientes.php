<h1>Clientes</h1>

<!-- Table -->
<table class="table tablesorter">
    <thead>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>CPF / CNPJ</th>
        <th>TIPO CLIENTE</th>
        <th>ENDEREÇO</th>
        <th>END. COBRANÇA</th>
        <th>EMAIL</th>
        <th>GRAU</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($clientes as $key => $cliente): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><a href="/MostraCliente/<?php echo $key; ?>"><?php echo $cliente->getNome(); ?></a></td>
            <td><?php echo $cliente->getCpfCnpj(); ?></td>
            <td><?php echo ($cliente instanceof ClienteFisico) ? "Pessoa Física" : "Pessoa Jurídica"; ?></td>
            <td><?php echo $cliente->getEndereco(); ?></td>
            <td><?php echo $cliente->getEndcobranca(); ?></td>
            <td><?php echo $cliente->getEmail(); ?></td>
            <td><?php echo $cliente->getGrau(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>