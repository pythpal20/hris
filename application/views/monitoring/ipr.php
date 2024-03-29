<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?= $title ?></h2>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <button class="btn btn-xs btn-flat btn-default create-form"><i class="fa fa-file"></i> Buat</button>
            <button class="btn btn-xs btn-flat btn-default set_penilai_btn"><i class="fa fa-address-card-o"></i> Penilai</button>
            <button class="btn btn-xs btn-flat btn-default set_periode"><i class="fa fa-clock-o"></i> Periode</button>
        </div>
    </div>
</div>
<style>
    .select2-container {
        width: 100% !important;
    }
</style>
<div class="wrapper wrapper-content">
    <div class="row">
        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12 animated animated fadeIn" style="background-color:white; display:block" id="monitor">
            <table id="table" class="table table-striped table-striped-columns animated fadeInRightBig" data-pagination="true" data-toggle="table" data-url="<?= base_url('monitoring/get_ipr') ?>" data-search="true" data-filter-control="true" data-show-toggle="true" data-check-on-init="true" data-show-search-clear-button="true" data-advanced-search="true" data-id-table="advancedTable" data-show-columns-toggle-all="true" data-show-columns="true" data-show-columns-toggle-all="true" data-show-pagination-switch="true" data-buttons-class="danger">
                <thead class=" table-light">
                    <tr data-valign="midle">
                        <th rowspan="2" data-field="nama" data-filter-control="select">Nama Karyawan</th>
                        <th colspan="2">Penilai 1</th>
                        <th colspan="2">Penilai 2</th>
                        <th colspan="2">Penilai 3</th>
                        <th colspan="2">Penilai 4</th>
                        <th colspan="2">Penilai 5</th>
                        <th colspan="2">Periode</th>
                        <th rowspan="2" data-field="progress">Progress</th>
                    </tr>
                    <tr>
                        <th data-field="penilai1"></th>
                        <th data-field="cek1"></th>
                        <th data-field="penilai2"></th>
                        <th data-field="cek2"></th>
                        <th data-field="penilai3"></th>
                        <th data-field="cek3"></th>
                        <th data-field="penilai4"></th>
                        <th data-field="cek4"></th>
                        <th data-field="penilai5"></th>
                        <th data-field="cek5"></th>
                        <th data-field="pdari" data-filter-control="select"></th>
                        <th data-field="pakhir"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-6 d-none animated fadeIn" id="form-penilai">
            <div class="ibox animated fadeInRightBig">
                <div class="ibox-title">
                    <h5>Pilih karyawan yang akan dinilai.</h5>
                    <p><small class="text-center mb-5">Memilih karyawan yg akan dilakukan penilaian & mengisikan periode penilaian.</small></p>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a id="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <form action="<?= base_url('monitoring/formPenilaian_save') ?>" method="POST">
                    <div class="ibox-content">
                        <button class="btn btn-primary mb-3 btn-sm buatSekaligus">Pilih Semua</button>
                        <div class="form-group">
                            <label for="nama-karyawan">Nama Karyawan</label>
                            <select name="nama-karyawan" id="nama-karyawan" class="select2-container form-control">
                                <option value="<?= set_value('nama-karyawan') ?>" <?php if (set_value('nama-karyawan') != NULL) : ?> selected <?php endif ?>><?= set_value('nama-karyawan') ?></option>
                            </select>
                            <?= form_error('nama-karyawan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penilai-1" class="font-normal">Penilai 1</label>
                            <input type="text" name="penilai-1" id="penilai-1" class="form-control" readonly>
                            <?= form_error('penilai-1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penilai-2" class="font-normal">Penilai 2</label>
                            <input type="text" name="penilai-2" id="penilai-2" class="form-control" readonly>
                            <?= form_error('penilai-2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penilai-3" class="font-normal">Penilai 3</label>
                            <input type="text" name="penilai-3" id="penilai-3" class="form-control" readonly>
                            <?= form_error('penilai-3', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penilai-4" class="font-normal">Penilai 4</label>
                            <input type="text" name="penilai-4" id="penilai-4" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="penilai-5" class="font-normal">Penilai 5</label>
                            <input type="text" value='' name="penilai-5" id="penilai-5" class="form-control" readonly>
                        </div>
                        <div class="form-group" id="data_1">
                            <label for="periode_select" class="font-normal">Periode </label>
                            <select id="periode_select" name="periode_select" data-placeholder="Pilih periode" class="chosen-select from-control" tabindex="2" required>
                                <option value="">Pilih</option>
                                <?php foreach ($periode->result() as $row) : ?>
                                    <option value="<?= $row->INT_ID ?>"><?= $row->TXT_JENIS ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('periode_select', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group" id="data_1">
                            <label class="font-normal" for="dari"> Dari </label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="dari" name="dari" type="text" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group" id="data_2">
                            <label class="font-normal" for="sampai"> Sampai </label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="sampai" type="text" name="sampai" class="form-control" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-footer">
                        <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 d-none" id="periodsViews">
            <div class="row">
                <div class="col-md-5">
                    <div class="ibox animated fadeInUpBig">
                        <div class="ibox-title">
                            <h5>Buat periode baru</h5>
                        </div>
                        <form action="<?= base_url('monitoring/newPeriod') ?>" method="POST">
                            <div class="ibox-content">
                                <div class="form-group" id="jenis_periode">
                                    <label class="font-normal" for="jenis_periode">Nama Periode</label>
                                    <input autocomplete="off" id="jenis_periode" name="jenis_periode" type="text" placeholder="ex: Semester II - 2024" class="form-control">
                                    <?= form_error('jenis_periode', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group" id="data_3">
                                    <label class="font-normal" for="dari_set">Dari</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input autocomplete="off" id="dari_set" name="dari_set" type="text" class="form-control">
                                        <?= form_error('dari_set', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group" id="data_4">
                                    <label class="font-normal" for="sampai_set">Sampai</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input autocomplete="off" name="sampai_set" id="sampai_set" type="text" class="form-control">
                                        <?= form_error('sampai_set', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-footer">
                                <button type="submit" class="btn btn-block btn-danger"><i class="fa fa-solid fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="ibox animated fadeInRightBig">
                        <div class="ibox-title">
                            <h5>Table data periode</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a id="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table id="tbperiode">

                            </table>
                        </div>
                        <div class="ibox-footer">
                            <button class="btn btn-secondary" id="tutup">Close tab</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 d-none" id="PenilaiTableForm">
            <div class="row">
                <div class="col-md-5">
                    <div class="ibox animated fadeInDownBig">
                        <div class="ibox-title text-center">
                            <h2 class="text-center">Set Penilai</h2>
                            <p class="text-sm-center"><small>Form set karyawan dan penilai untuk digunakan secara sekaligus.</small></p>
                        </div>
                        <form action="<?= base_url('monitoring/setPenilai') ?>" method="POST" id="formPenilais">
                            <div class="ibox-content">
                                <div class="form-group">
                                    <label class="font-normal" for="karyawan-set">Karyawan</label>
                                    <select id="karyawan-set" name="karyawan-set" class="form-control select2-container">
                                        <option value="">Pilih Karyawan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-normal" for="penilai1-set">Penilai 1</label>
                                    <select id="penilai1-set" name="penilai1-set" data-placeholder="Pilih penilai 1" class="form-control select2-container" tabindex="2" required>
                                        <option value="">Pilih Penilai-1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-normal" for="penilai2-set">Penilai 2</label>
                                    <select id="penilai2-set" name="penilai2-set" data-placeholder="Pilih penilai 2" class="form-control select2-container" tabindex="2" required>
                                        <option value="">Pilih Penilai-2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-normal" for="penilai3-set">Penilai 3</label>
                                    <select id="penilai3-set" name="penilai3-set" data-placeholder="Pilih penilai 3" class="form-control select2-container" tabindex="2" required>
                                        <option value="">Pilih Penilai-3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-normal" for="penilai4-set">Penilai 4</label>
                                    <select id="penilai4-set" name="penilai4-set" data-placeholder="Pilih penilai 4" class="form-control select2-container" tabindex="2" required>
                                        <option value="-">Pilih</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-normal" for="penilai4-set">Penilai 5</label>
                                    <select id="penilai5-set" name="penilai5-set" data-placeholder="Pilih penilai 5" class="form-control select2-container" tabindex="2">
                                        <option value="-">Pilih</option>
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ibox-footer">
                                <button type="button" class="btn btn-sm btn-warning cekForm">Validasi</button>
                                <button type="submit" class="btn btn-sm btn-success float-right simpan" disabled>Simpan</button>
                                <p class="mt-3"><small><sup class="text-danger">*</sup> `Validasi` terlebih dahulu sebelum simpan</small></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="ibox animated fadeInRightBig">
                        <div class="ibox-title text-center">
                            <h2 class="text-center">LIST KARYAWAB & PENILAI</h2>
                            <p class="text-sm-center"><small>List dari karyawan dan penilai yang sudah diset untuk digunakan secara sekaligus.</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script async>
    $(document).ready(function() {
        function cek_sama(nama) {
            var temp = [];
            for (let index = 0; index < nama.length; index++) {
                if (temp.includes(nama[index])) {
                    return true;
                }
                if (nama[index] !== "1") {
                    temp.push(nama[index]);
                }
            }
            return false;
        }
        $(".cekForm").click(function() {
            var karyawan = $("#karyawan-set").val();
            var pen1 = $("#penilai1-set").val();
            var pen2 = $("#penilai2-set").val();
            var pen3 = $("#penilai3-set").val();
            var pen4 = $("#penilai4-set").val();
            var pen5 = $("#penilai5-set").val();

            var KarPen = [];
            KarPen.push(karyawan);
            KarPen.push(pen1);
            KarPen.push(pen2);
            KarPen.push(pen3);
            KarPen.push(pen4);
            KarPen.push(pen5);

            console.log(KarPen);
            if (cek_sama(KarPen)) {
                Swal.fire({
                    title: 'Validasi Form',
                    text: 'Terdapat nama yang sama antara Karyawan - penilai',
                    icon: 'warning'
                });
            } else {
                $(".simpan").removeAttr("disabled");
            }
        });
    });
    $(document).ready(function() {
        const viewTable = $("#monitor");
        const viewFormPenilai = $("#form-penilai");
        const periodeView = $("#periodsViews");
        const penilaiTF = $("#PenilaiTableForm");

        $(".create-form").on('click', function() {
            viewTable.addClass("d-none");
            viewFormPenilai.removeClass("d-none");
            periodeView.addClass("d-none");
            penilaiTF.addClass("d-none");
        });

        $(".set_penilai_btn").on('click', function() {
            viewTable.addClass("d-none");
            viewFormPenilai.addClass("d-none");
            periodeView.addClass("d-none");
            penilaiTF.removeClass("d-none");
        })

        $("#close-link").on('click', function() {
            viewTable.removeClass("d-none");
            viewFormPenilai.addClass("d-none");
            periodeView.addClass("d-none");
            penilaiTF.addClass("d-none");
        });
        $("#tutup").click(function() {
            viewTable.removeClass("d-none");
            viewFormPenilai.addClass("d-none");
            periodeView.addClass("d-none");
            penilaiTF.addClass("d-none");
        });

        $(".set_periode").on('click', function() {
            viewTable.addClass("d-none");
            viewFormPenilai.addClass("d-none");
            periodeView.removeClass("d-none");

            // buat table
            $('#tbperiode').bootstrapTable('destroy');
            axios.get("<?= base_url('monitoring/ambilPeriode') ?>")
                .then(function(response) {
                    var res = response.data;

                    $table = $("#tbperiode").bootstrapTable({
                        data: res,
                        search: true,
                        pagination: true,
                        filterControl: true,
                        columns: [{
                            field: 'nama',
                            title: 'Nama Periode'
                        }, {
                            field: 'awal',
                            title: 'Awal',
                            sortable: true
                        }, {
                            field: 'akhir',
                            title: 'Akhir',
                            sortable: true
                        }, {
                            field: 'status',
                            title: 'status',
                            align: 'center',
                            sortable: true,
                            filterControl: 'select'
                        }, {
                            field: 'active',
                            title: 'Act.',
                            align: 'center',
                            formatter: function(value, row) {
                                if (value === '0') {
                                    return [
                                        '<button class="btn btn-xs btn-info menyala" data-id="' + row.id + '"><i class="fa fa-check"></i></button>'
                                    ]
                                } else if (value === '1') {
                                    return [
                                        '<button class="btn btn-xs btn-danger redup" data-id="' + row.id + '"><i class="fa fa-trash"></i></button>'
                                    ]
                                }
                            }
                        }]
                    });

                    $('body').on('click', '#tbperiode .menyala', function() {
                        const id = $(this).data('id');
                        const act = "menyala"; //menyala abangkuhhh!!!
                        Swal.fire({
                            title: 'Aktivasi',
                            text: 'Aktifkan periode ini kembali? Masukkan password anda terlebih dahulu!',
                            icon: 'question',
                            input: 'password',
                            inputAttributes: {
                                autocomplete: "off",
                                autocapitalize: "off",
                            },
                            showCancelButton: true,
                            showLoaderOnConfirm: true,
                            preConfirm: async (menyala) => {
                                try {
                                    const Url = "<?= base_url('monitoring/periodeAction') ?>";
                                    const response = await fetch(Url, {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                        },
                                        body: JSON.stringify({
                                            id: id,
                                            action: act,
                                            pass: menyala
                                        })
                                    });
                                    if (!response.ok) {
                                        throw new Error("HTTP error! status: " + response.status);
                                    }
                                    const resultText = await response.json();
                                    // console.log(resultText);
                                    if (resultText.status === 'error') {
                                        swalalertError(resultText.message);
                                    } else if (resultText.status === 'success') {
                                        swalalertSuccess(resultText.message);
                                    }
                                } catch (error) {
                                    Swal.fire({
                                        title: 'Error',
                                        text: error,
                                        icon: 'error'
                                    })
                                    // console.error("ERROR : ", error);
                                }
                            }
                        });
                        document.querySelector(".swal2-input").placeholder = "Type your password";

                    });
                    $('body').on('click', '#tbperiode .redup', function() {
                        const id = $(this).data('id');
                        const act = "redup";
                        Swal.fire({
                            title: 'Nonaktif',
                            text: 'Nonaktifkan periode ini? Pastikan semua sudah dinilai dengan baik!',
                            icon: 'question',
                            showCancelButton: true,
                            showLoaderOnConfirm: true,
                            preConfirm: async (redup) => {
                                try {
                                    const Url = "<?= base_url('monitoring/periodeAction') ?>";
                                    const response = await fetch(Url, {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                        },
                                        body: JSON.stringify({
                                            id: id,
                                            action: act
                                        })
                                    });
                                    if (!response.ok) {
                                        throw new Error("HTTP error! status: " + response.status);
                                    }
                                    const resultText = await response.json();
                                    // console.log(resultText);
                                    if (resultText.status === 'error') {
                                        swalalertError(resultText.message);
                                    } else if (resultText.status === 'success') {
                                        swalalertSuccess(resultText.message);
                                    }
                                } catch (error) {
                                    Swal.fire({
                                        title: 'Error',
                                        text: error,
                                        icon: 'error'
                                    })
                                    console.error("ERROR : ", error);
                                }
                            }
                        })
                    });

                })
                .catch(function(error) {
                    console.error(error);
                });
        });

        $(".select2-container").select2({
            allowClear: true,
            placeholder: "-- Silahkan Nama Karyawan --",
            ajax: {
                url: "<?= base_url('monitoring/dataKar') ?>",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        cariNamaDevisi: params.term // search term
                    };
                },
                processResults: function(response) {
                    // console.log(response);
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        $('.chosen-select').chosen({
            width: "100%"
        });

        $('.buatSekaligus').on('click', function() {
            $('#modalBuatSekaligus').modal('show');
        })

        $("#nama-karyawan").on('change', async function() {
            const namaKaryawan = $(this).val();
            try {
                const Url = "<?= base_url('monitoring/cekPenilai') ?>";
                const response = await fetch(Url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json", // Ubah header Content-Type
                    },
                    body: JSON.stringify({
                        namaKar: namaKaryawan
                    })
                })
                if (!response.ok) {
                    throw new Error("HTTP error! status: " + response.status);
                }
                const resultText = await response.json();
                if (resultText.status != 'error') {
                    var res = resultText[0];
                    $("#penilai-1").val(res.penilai1);
                    $("#penilai-2").val(res.penilai2);
                    $("#penilai-3").val(res.penilai3);
                    $("#penilai-4").val(res.penilai4);
                    $("#penilai-5").val(res.penilai5);
                }
            } catch (error) {
                Swal.fire({
                    title: 'Error',
                    text: error,
                    icon: 'error'
                });
            }
        });

        $("#periode_select").on('change', function() {
            const id = $(this).val();
            const dataSend = {
                id: id
            };

            axios.post("<?= base_url('monitoring/cekPeriode') ?>", dataSend)
                .then(function(response) {
                    var result = response.data[0];
                    $("#dari").val(result.awal);
                    $("#sampai").val(result.akhir);
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    });
</script>