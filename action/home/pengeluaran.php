<?php
                        // Koneksi ke database
                        // $koneksi = mysqli_connect("localhost", "username", "password", "nama_database");
                        include '../../connection/connection.php';

                        // Query untuk menjumlahkan total_harga
                        $query = "SELECT SUM(total_harga) AS total FROM transaksi";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);