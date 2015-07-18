<h1>Clientes</h1>

<!-- Table -->
<table class="table tablesorter">
    <thead>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>CPF</th>
        <th>ENDEREÇO</th>
        <th>EMAIL</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($clientes as $key => $cliente): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><a href="/MostraCliente/<?php echo $key; ?>"><?php echo $cliente->getNome(); ?></a></td>
            <td><?php echo $cliente->getCpf(); ?></td>
            <td><?php echo $cliente->getEndereco(); ?></td>
            <td><?php echo $cliente->getEmail(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>