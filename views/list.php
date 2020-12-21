<div class="wrap">
    <h1>User Concent List</h1>
    <?php if (!empty($concent)) : ?>
        <div class="mf_box">
            Export to CSV
            <table id="mf-user-concent">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Codice Fiscale</th>
                        <th>Ente di Appartenenza</th>
                        <th>Specializzazione</th>
                        <th>Indirizzo Principale</th>
                        <th>Località</th>
                        <th>CAP</th>
                        <th>Provincia</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Altro Telefono</th>
                        <th>Indirizzo secondario</th>
                        <th>CAP</th>
                        <th>Località</th>
                        <th>letta-informativa</th>
                        <th>Acceptance 1</th>
                        <th>Acceptance 2</th>
                        <th>Aree di interesse</th>
                        <th>ip</th>
                        <th>Browser</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($concent as $c) : ?>
                        <tr>
                            <td><?php echo empty($c->user_data->nome) ? '' : $c->user_data->nome; ?></td>
                            <td><?php echo empty($c->user_data->cognome) ? '' : $c->user_data->cognome; ?></td>
                            <td><?php echo empty($c->user_data->codicefiscale) ? '' : $c->user_data->codicefiscale; ?></td>
                            <td><?php echo empty($c->user_data->ente) ? '' : $c->user_data->ente; ?></td>
                            <td><?php echo empty($c->user_data->specializzazione) ? '' : $c->user_data->specializzazione; ?></td>
                            <td><?php echo empty($c->user_data->indirizzo) ? '' : $c->user_data->indirizzo; ?></td>
                            <td><?php echo empty($c->user_data->localita) ? '' : $c->user_data->localita; ?></td>
                            <td><?php echo empty($c->user_data->cap) ? '' : $c->user_data->cap; ?></td>
                            <td><?php echo empty($c->user_data->Provincia) ? '' : $c->user_data->Provincia; ?></td>
                            <td><?php echo empty($c->user_data->email) ? '' : $c->user_data->email; ?></td>
                            <td><?php echo empty($c->user_data->telefono1) ? '' : $c->user_data->telefono1; ?></td>
                            <td><?php echo empty($c->user_data->telefono2) ? '' : $c->user_data->telefono2; ?></td>
                            <td><?php echo empty($c->user_data->indirizzo2) ? '' : $c->user_data->indirizzo2; ?></td>
                            <td><?php echo empty($c->user_data->cap2) ? '' : $c->user_data->cap2; ?></td>
                            <td><?php echo empty($c->user_data->localita2) ? '' : $c->user_data->localita2; ?></td>
                            <td><?php echo empty($c->user_data->{'letta-informativa'}) ? '' : 'Si'; ?></td>
                            <td><?php echo empty($c->user_data->acceptance1) ? '' : $c->user_data->acceptance1; ?></td>
                            <td><?php echo empty($c->user_data->acceptance2) ? '' : $c->user_data->acceptance2; ?></td>
                            <td><?php if (!empty($c->user_data->{'aree-interesse'})) echo implode(', ', $c->user_data->{'aree-interesse'}); ?></td>
                            <td><?php echo empty($c->ip) ? '' : $c->ip; ?></td>
                            <td><?php echo empty($c->browser) ? '' : $c->browser; ?></td>
                            <td><?php echo empty($c->datei) ? '' : $c->datei; ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<script>
    jQuery(document).ready(function($) {
        $('#mf-user-concent').DataTable({
            "scrollX": true,
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'csvHtml5',
            ], 
            "order": [[ 21, "desc" ]]
        });
    });
</script>