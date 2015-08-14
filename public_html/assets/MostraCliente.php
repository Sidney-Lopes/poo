<?php use SJL\Clientes\Tipo\ClienteFisico; ?>
<?php if(isset($segments['1'])): ?>
<?php $key = $segments['1']; ?>

<table class="table">
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

    <tr>
        <td><?php echo $key; ?></td>
        <td><?php echo $clientes[$key]->getNome(); ?></a></td>
        <td><?php echo $clientes[$key]->getCpfCnpj(); ?></td>
        <td><?php echo ($clientes[$key] instanceof ClienteFisico) ? "Pessoa Física" : "Pessoa Jurídica"; ?></td>
        <td><?php echo $clientes[$key]->getEndereco(); ?></td>
        <td><?php echo $clientes[$key]->getEndcobranca(); ?></td>
        <td><?php echo $clientes[$key]->getEmail(); ?></td>
        <td><?php echo $clientes[$key]->getGrau(); ?></td>
    </tr>

</table>

<?php endif; ?>
