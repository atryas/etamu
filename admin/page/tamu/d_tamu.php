<?php 

    function tglIndonesia2($str2){
               $tr2   = trim($str2);
               $str2    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr2);
               return $str2;
           }

 ?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                             Data Tamu 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="example1">
                                  <!--<a href="?page=tamu" class="btn btn-success" style="margin-bottom:  8px;"><i class="fa fa-plus"></i> Tambah </a>-->
                                    <a id="lap_masuk" data-toggle="modal" data-target="#lap" style="margin-bottom:  8px; margin-left: 5px;" class="btn btn-default"><i class="fa fa-print"></i> Cetak PDF</a>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>nama</th>
                                            <th>Alamat</th>
                                             <th>Instansi</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Keperluan</th>
                                            <th>Tanggal</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <th>Ketemu</th>
                                            <th>Foto</th>
                                            
                                           
                                            
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php


                                            

                                            $no = 1;

                                            $sql = $koneksi->query("select * from tb_tamu, tb_perlu where tb_tamu.keperluan=tb_perlu.id order by id_tamu desc");
                                        

                                            while ($data= $sql->fetch_assoc()) {

                                             $jk = ($data['jk']==L)?"Laki-laki":"Wanita";   

                                             $jam_keluar = $data['jam_keluar'];



                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama'];?></td>
                                             <td><?php echo $data['alamat']; ?></td>
                                             <td><?php echo $data['instansi']; ?></td>
                                             <td><?php echo $jk; ?></td>
                                             <td><?php echo $data['judul']; ?></td>
                                             <td><?php echo date('d F Y', strtotime($data['tanggal'])); ?></td>
                                             <td><?php echo $data['jam']; ?></td>

                                            <?php if ($jam_keluar=='00:00:00') {
                                               
                                            ?>

                                             <td><a href="?page=d_tamu&aksi=keluar&id=<?php echo $data['id_tamu']; ?>" class="btn btn-danger btn-xs" > Check Out</a></td>

                                             <?php } else{ ?>
                                                 <td><?php echo $data['jam_keluar']; ?></td>
                                             <?php } ?>

                                             <td><?php echo $data['ketemu']; ?></td>

                                             <td> <img src="../upload/<?php echo $data['foto']; ?>" width="75" height="75" alt=""> </td>
                                             
                                             

                                             <td>
                                                <a href="?page=d_tamu&aksi=ubah&id=<?php echo $data['id_tamu']; ?>" class="btn btn-info btn-xs" ><i class="fa fa-edit "></i> Ubah</a>
                                                <a onclick="return confirm('Anda Yakin Akan Mengahapus Data Ini ... ???')" href="?page=d_tamu&aksi=hapus&id=<?php echo $data['id_tamu']; ?>" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i> Hapus</a>

                                               

                                                <a  href="https://api.whatsapp.com/send?phone=<?php echo $data['no_hp'] ?>&text=Tamu Atas Nama<?php echo $data['nama']?>, Alamat: <?php echo $data['alamat']?>, Pada <?php echo tglIndonesia2(date('D, d F Y', strtotime($data['tanggal'])))?>, Jam <?php echo $data['jam']?> Wib, Keperluan <?php echo $data['judul']?>" target="blank" class="btn btn-success btn-xs"> <i class="fa  fa-whatsapp"></i> Kirim WA</a>

                                               

                                            </td>
                                        </tr>


                                        <?php  } ?>
                                    </tbody>

                                    </table>
                                  </div>

                                 

                        </div>
                     </div>
                   </div>
     </div>


<?php  if($_SESSION['admin']){ ?>

 <div class="modal fade" id="lap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Laporan Data Tamu</h4>
                                        </div>

                                        <div class="modal-body">
                                          <form role="form" method="POST" action="page/tamu/laporan.php" target="blank" >

                                            
                                            <div class="form-group">
                                                <label>Dari Tanggal</label>
                                                <input required="" class="form-control" type="date" name="tgl1" /> 
                                            </div>

                                             <div class="form-group">
                                                <label> Sampai Tanggal</label>
                                                <input required="" class="form-control" type="date" name="tgl2" /> 
                                            </div>

                                           

                                            <div class="modal-footer">

                                           <button type="submit"  name="cetak" class="btn btn-warning" style="margin-top: 8px;"><i class="fa fa-print"></i> Cetak</button>
                                            
                                           

                                            

                                            
                                            </div>
                                            </div>  
                                      
                                        
                                        </form> 


    
                                    </div>
                                </div>
                           
                    </div>


 <?php }else ?>
 
 <div class="modal fade" id="lap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Laporan Data Tamu</h4>
                                        </div>

                                        <div class="modal-body">
                                          <form role="form" method="POST" action="page/tamu/laporan2.php" target="blank" >

                                            
                                            <div class="form-group">
                                                <label>Dari Tanggal</label>
                                                <input required="" class="form-control" type="date" name="tgl1" /> 
                                            </div>

                                             <div class="form-group">
                                                <label> Sampai Tanggal</label>
                                                <input required="" class="form-control" type="date" name="tgl2" /> 
                                            </div>

                                             <div class="form-group">
                                            
                                                <input type="hidden"   name="unit_kerja" value="<?php echo $unit_kerja; ?>" /> 
                                            </div>

                                           

                                            <div class="modal-footer">

                                           <button type="submit"  name="cetak" class="btn btn-warning" style="margin-top: 8px;"><i class="fa fa-print"></i> Cetak</button>
                                            
                                           

                                            

                                            
                                            </div>
                                            </div>  
                                      
                                        
                                        </form> 


    
                                    </div>
                                </div>
                           
                    </div>

 <?php  ?>                   