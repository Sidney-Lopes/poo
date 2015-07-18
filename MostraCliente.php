<?php if(isset($segments['1'])): ?>
<?php $key = $segments['1']; ?>

<table class="table">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>CPF</th>
        <th>ENDEREÇO</th>
        <th>EMAIL</th>
    </tr>

    <tr>
        <td><?php echo $key; ?></td>
        <td><?php echo $clientes[$key]->getNome(); ?></a></td>
        <td><?php echo $clientes[$key]->getCpf(); ?></td>
        <td><?php echo $clientes[$key]->getEndereco(); ?></td>
        <td><?php echo $clientes[$key]->getEmail(); ?></td>
    </tr>

</table>

<?php endif; ?>
