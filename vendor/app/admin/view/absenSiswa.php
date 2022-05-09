<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <th>Tanggal</th>
                <th>Mapel</th>
                <th>Hari</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php
                $data = tableId('absensi', 'id_siswa', $_SESSION['id_siswa']);
                // tableIdAnd('absensi', 'id_kelas', $id_kelas, 'tanggal', dateNow());
                while ($row = fetch($data)) {
                    echo '<tr>
                    <td>' . $row['tanggal'] . '</td>
                    <td>' . tableNameFieldId('tbl_mapel', 'id_mapel', $row['id_mapel'], 'mapel') . '</td>
                    <td>' . $row['hari'] . '</td>
                    <td>' . $row['status'] . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>