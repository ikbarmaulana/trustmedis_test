<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Jadwal Dokter</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('jadwal'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmEditPoli', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pegawai</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_pegawai" name="id_pegawai">
                                <option selected="0">select..</option>
                                    <?php foreach($data_pegawai as $row)  : ?>
                                <option value="<?php echo $row->id;?>"> <?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_hari" name="id_hari">
                                <option selected="0">select..</option>
                                    <?php foreach($data_hari as $row)  : ?>
                                <option value="<?php echo $row->id;?>"> <?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Jam Mulai</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value=" <?= set_value('jam_mulai'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('jam_mulai') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Jam Berakhir</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="jam_berakhir" name="jam_berakhir" value=" <?= set_value('jam_berakhir'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('jam_berakhir') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>