<?php /* @var $this CupMailer */ ?>
<table rules="all" style="border-color: #666;" cellpadding="10">
    <tbody>
        <?php
        $produtos = $dados['produtos'];
        unset($dados['produtos']);
        foreach ((array) $dados as $n => $c) {
            ?>
            <tr>
                <td>
                    <strong><?= $n ?>:</strong>
                </td>
                <td>
                    <?= $c ?>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="2"><h1>Produtos</h1></td>
        </tr>
        <tr>
            <td colspan="2">
                <table rules="all" style="border-color: #666;" cellpadding="10">
                    <tbody>
                        <tr>
                            <th>
                                Categoria
                            </th>
                            <th>
                                Nome
                            </th>
                            <th>
                                REF
                            </th>
                            <th>
                                Tamanho
                            </th>
                            <th>
                                Quantidade
                            </th>
                        </tr>
                        <?php
                        foreach ($produtos as $p) {
                            ?>
                            <tr>
                                <td>
                                    <?= $p['categoria_mestra'] . ' : ' . $p['categoria'] ?>
                                </td>
                                <td>
                                    <?= $p['nome'] ?>
                                </td>
                                <td>
                                    <?= $p['ref'] ?>
                                </td>
                                <td>
                                    <?= $p['tamanho'] ?>
                                </td>
                                <td>
                                    <?= $p['quantidade'] ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <strong>IP:</strong>
            </td>
            <td>
                <?= $_SERVER['REMOTE_ADDR'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Data/Hora:</strong>
            </td>
            <td>
                <?= Date('d/m/Y H:i:s') ?>
            </td>
        </tr>
    </tbody>
</table>