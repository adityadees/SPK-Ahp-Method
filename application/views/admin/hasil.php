<?php
        if( $hasil->num_rows() )
        {
            echo '<table class="table table-bordered table-condensed table-hover table-striped" id="hasil-akhir">
            <thead>
                <tr>
                    <th>Kode Jalan</th>
                    <th>Nama Jalan</th>
                    <th>Nilai</th>
                </tr>
            </thead><tbody>'; 
            foreach ($hasil->result() as $key => $value) {
                echo '<tr>
                    <td>'.$value->kode_jalan.'</td>
                    <td>'.$value->nama_jalan.'</td>
                    <td>'.$value->nila_weigh.'</td>
                </tr>';
            }
            echo '</tbody></table>';
        }