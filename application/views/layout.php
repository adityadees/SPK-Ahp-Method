<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SPK PENILAIAN JALAN | <?php echo $title; ?></title>

  <!-- CRUD -->
  <?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; ?>
  <script type="text/javascript" src="<?php echo base_url() . 'template/vendors/jquery/dist/jquery.min.js'; ?>"></script>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url(); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Penilaian Jalan</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $sess_nama; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">


                <?php if($_SESSION['level']==='desa') {?>
                  <li><a href="<?= base_url(); ?>home"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a href="<?= base_url(); ?>jalan"><i class="fa fa-road"></i> Jalan</a></li>
                  <li><a href="<?= base_url(); ?>inbox"><i class="fa fa-inbox"></i> Inbox</a></li>
                  <li><a href="<?= base_url(); ?>foto"><i class="fa fa-image"></i> Foto</a></li>
                  <li><a href="<?= base_url(); ?>home/hasil_permanen"><i class="fa fa-home"></i>Hasil</a></li>
                <?php } else if($_SESSION['level']==='camat'){?>
                  <li><a href="<?= base_url(); ?>home"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a href="<?= base_url(); ?>jalan"><i class="fa fa-road"></i> Crosscheck Data</a></li>
                  <li><a href="<?= base_url(); ?>home/hasil_permanen"><i class="fa fa-home"></i>Hasil</a></li>
                <?php } else if($_SESSION['level']==='pu'){?>
                  <li><a href="<?= base_url(); ?>home/hasil_permanen"><i class="fa fa-print"></i>Hasil</a></li>
                <?php } else { ?>
                  <li><a href="<?= base_url(); ?>home"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a href="<?= base_url(); ?>home/kriteria"><i class="fa fa-th-large"></i> Kriteria</a></li>
                  <li><a href="<?= base_url(); ?>home/kecamatan"><i class="fa fa-institution"></i> Kecamatan</a></li>
                  <li><a href="<?= base_url(); ?>home/desa"><i class="fa fa-building"></i> Desa</a></li>
                  <li><a href="<?= base_url(); ?>home/users"><i class="fa fa-user"></i> User</a></li>
                  <li><a href="<?= base_url(); ?>inbox"><i class="fa fa-inbox"></i> Inbox</a></li>
                  <li><a href="<?= base_url(); ?>home/set_kriteria"><i class="fa fa-check"></i>Set Hasil</a></li>
                <?php } ?>

    <!--             <li><a><i class="fa fa-table"></i> Master <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url(); ?>home/camat">Kecamatan</a></li>
                    <li><a href="<?php echo base_url(); ?>home/desa">Desa</a></li>
                    <li><a href="<?php echo base_url(); ?>home/lurah">Kelurahan Lurah</a></li> 
                    <li><a href="<?php echo base_url(); ?>home/jalan">Jalan</a></li>
                  </ul>
                </li>

                <li>
                  <a><i class="fa fa-calendar"></i>Proses <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  </ul>
                </li> -->
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt=""><?php echo $sess_nama; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

            <!-- <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3>
              </div>
            </div> -->
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $title; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <?php
                      if($title=='Hasil'){ if($_SESSION['level']=='pu'){?>
                        <a href="<?= base_url()?>laporan" class="btn btn-primary">Print</a>
                      <?php } else {} } else {
                        ?>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <?php } ?>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <p>
                    <?php if($this->session->flashdata('success')){ ?>
                      <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
                      </div>
                    <?php } else if($this->session->flashdata('error')){?>
                      <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                      </div>
                    <?php }?>
                  </p>
                  <div class="x_content">
                    <?php 
                    if($output==='JalanView'){ 
                      if($_SESSION['level']==='desa'){
                        ?>

                        <div class="row">
                          <div class="col-md-12">
                            <a href="<?= base_url();?>jalan/add" class="btn btn-primary pull-right">Tambah Data</a>
                          </div>
                        </div>
                      <?php } else {}?>
                      <br>
                      <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Nama Desa</th>
                            <th>Nama Jalan</th>
                            <?php foreach ($qKriteria as $key) : ?>
                              <th><?= $key['nama_kriteria']; ?></th>
                            <?php endforeach ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          foreach ($qPenilaian as $ss) : 
                            ?>
                            <tr>
                              <td><?= $ss['nama_desa']; ?></td>
                              <td><?= $ss['nama_jalan']; ?></td>
                              <?php 
                              $nilai = $this->Mymod->ViewDataWhere('penilaian',['kode_jalan' => $ss['kode_jalan']])->result_array();
                              foreach ($nilai as $sk) : 
                                ?>
                                <td><?= $sk['penilaian_nilai']; ?></td>
                              <?php endforeach ?>

                            </tr> 
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    <?php } else if($output==='JalanAdd') {
                      ?>
                      <form class="form-horizontal form-label-left" method="POST" action="<?= base_url()?>jalan/save_jalan">
                        <div class="form-group">
                          <label class="control-label col-md-3">Nama Jalan</label>
                          <div class="col-md-7">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>" class="form-control col-md-7 col-xs-12">
                            <input type="text" name="nama_jalan" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Periode</label>
                          <div class="col-md-7">
                            <input type="date" name="periode" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <?php foreach ($qKriteria as $key) : ?>
                          <div class="form-group">
                            <label class="control-label col-md-3"><?= $key['nama_kriteria']; ?></label>
                            <div class="col-md-7">
                              <input type="text" name="kriteria_val[]" class="form-control col-md-7 col-xs-12">
                              <input type="hidden" name="kriteria_id[]" value="<?= $key['id_kriteria']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        <?php endforeach ?>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button" onclick="goBack()">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                      </form>


                      
                    <?php } else if($output==='InboxDesa') {
                      ?>
                      <br>
                      <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Judul</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          foreach ($pesan as $ss) : 
                            ?>
                            <tr>
                              <td><?= $ss['pesan_judul']; ?></td>
                              <td><?= $ss['pesan_message']; ?></td>
                              <td><?= date('d-m-Y H:i:s',strtotime($ss['pesan_tanggal'])); ?></td>
                              <td>
                                <a href="#" data-toggle="modal" data-target=".delPD<?= $ss['pesan_id']; ?>">
                                  <i class="fa fa-trash"></i>
                                </a>
                              </td>
                            </tr> 
                          <?php endforeach ?>
                        </tbody>
                      </table>



                      <?php foreach($pesan as $i):?>
                        <div class="modal fade bs-example-modal-lg delPD<?= $i['pesan_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-md">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Hapus Pesan</h4>
                              </div>
                              <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= base_url();?>inbox/del_pesan">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <input type="hidden" name="pesan_id" value="<?= $i['pesan_id']; ?>">
                                    <h4>Apakah anda yakin akan menghapus data ini?</h4>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <input type="submit" value="Ya" class="btn btn-primary">
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; } else if($output==='InboxAdmin') {
                        ?>
                        <br>
                        <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Telepon</th>
                              <th>Isi</th>
                              <th>Tanggal</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            foreach ($pesan as $ss) : 
                              ?>
                              <tr>
                                <td><?= $ss['kritik_nama']; ?></td>
                                <td><?= $ss['kritik_email']; ?></td>
                                <td><?= $ss['kritik_telepon']; ?></td>
                                <td><?= $ss['kritik_isi']; ?></td>
                                <td><?= date('d-m-Y H:i:s',strtotime($ss['kritik_tanggal'])); ?></td>
                                <td>
                                  <a href="#" data-toggle="modal" data-target=".delPA<?= $ss['kritik_id']; ?>">
                                    <i class="fa fa-trash"></i>
                                  </a>
                                </td>
                              </tr> 
                            <?php endforeach ?>
                          </tbody>
                        </table>


                        <?php foreach($pesan as $i):?>
                          <div class="modal fade bs-example-modal-lg delPA<?= $i['kritik_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                  <h4 class="modal-title" id="myModalLabel">Hapus Pesan</h4>
                                </div>
                                <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= base_url();?>inbox/del_pesan_adm">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <input type="hidden" name="kritik_id" value="<?= $i['kritik_id']; ?>">
                                      <h4>Apakah anda yakin akan menghapus data ini?</h4>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                      <input type="submit" value="Ya" class="btn btn-primary">
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; } else if($output==='FotoJalan'){   ?>

                          <div class="row">
                            <div class="col-md-12">
                              <a href="<?= base_url();?>foto/add" class="btn btn-primary pull-right">Tambah Data</a>
                            </div>
                          </div>

                          <div class="row">
                            <?php foreach ($FJalan as $kf) : ?>
                              <div class="col-md-55">
                                <div class="thumbnail">
                                  <div class="image view view-first">
                                    <img style="width: 100%; display: block;" src="<?= base_url()?>assets/images/<?= $kf['filefoto']; ?>" alt="image" />
                                    <div class="mask">
                                      <p><?= $kf['gallery_judul']; ?></p>
                                      <div class="tools tools-bottom">
                                        <a href="#" data-toggle="modal" data-target=".del_ft<?= $kf['gallery_id']; ?>">
                                          <i class="fa fa-trash"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="caption">
                                    <p><?= $kf['nama_jalan']; ?></p>
                                  </div>
                                </div>
                              </div>
                            <?php endforeach; ?>
                          </div>

                          <?php foreach($FJalan as $iag):?>
                            <div class="modal fade bs-example-modal-lg del_ft<?= $iag['gallery_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Hapus Pesan</h4>
                                  </div>
                                  <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?= base_url();?>foto/del_foto">
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <input type="hidden" name="gallery_id" value="<?= $iag['gallery_id']; ?>">
                                        <h4>Apakah anda yakin akan menghapus data ini?</h4>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <input type="submit" value="Ya" class="btn btn-primary">
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; } else if($output==='FotoAdd') { ?>
                            <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="<?= base_url()?>foto/save_foto">
                              <div class="form-group">
                                <label class="control-label col-md-3">Judul Foto</label>
                                <div class="col-md-7">
                                  <input type="text" name="judul_foto" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-md-3">Pilih Jalan</label>
                                <div class="col-md-7">
                                  <select name="jalan" class="form-control">
                                    <?php foreach ($gJl as $key) : ?>
                                      <option value="<?= $key['kode_jalan']; ?>"><?= $key['nama_jalan']; ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>


                              <div class="form-group">
                                <label class="control-label col-md-3">Foto</label>
                                <div class="col-md-7">
                                  <input type="file" name="filefoto"  required class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button class="btn btn-primary" type="button" onclick="goBack()">Cancel</button>
                                  <button class="btn btn-primary" type="reset">Reset</button>
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                              </div>
                            </form>
                          <?php }else { echo $output; } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /page content -->

              <!-- footer content -->
              <footer>
                <div class="pull-right">
                  Gufakto & co - <?php echo date('Y'); ?>
                </div>
                <div class="clearfix"></div>
              </footer>
              <!-- /footer content -->
            </div>
          </div>

          <!-- compose -->
          <div class="compose col-md-6 col-xs-12">
            <div class="compose-header">
              New Message
              <button type="button" class="close compose-close">
                <span>×</span>
              </button>
            </div>

            <div class="compose-body">
              <div id="alerts"></div>

              <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  </ul>
                </div>

                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a data-edit="fontSize 5">
                        <p style="font-size:17px">Huge</p>
                      </a>
                    </li>
                    <li>
                      <a data-edit="fontSize 3">
                        <p style="font-size:14px">Normal</p>
                      </a>
                    </li>
                    <li>
                      <a data-edit="fontSize 1">
                        <p style="font-size:11px">Small</p>
                      </a>
                    </li>
                  </ul>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                  <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                  <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                  <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                  <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                  <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                  <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                  <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                  <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                  <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                  <div class="dropdown-menu input-append">
                    <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                    <button class="btn" type="button">Add</button>
                  </div>
                  <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                  <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                  <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                </div>
              </div>

              <div id="editor" class="editor-wrapper"></div>
            </div>

            <div class="compose-footer">
              <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
            </div>
          </div>
          <!-- /compose -->

          <!-- CRUD -->
          <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
          <?php endforeach; ?>

          <script>
            function goBack() {
              window.history.back();
            }
          </script>
        </body>
        </html>