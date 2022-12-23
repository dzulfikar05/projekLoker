<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Form Pendidikan</div>
            </div>
            <div class="card-body">
                <form  action="javascript:onSave(this)" method="post" id="form_pendidikan" name="form_pendidikan" autocomplete="off">
                    <input type="hidden" name="pendidikan_id" id="pendidikan_id">
                    <div class="form-label">
                        <label class="mb-2 required" for="pendidikan_kode"> Pendidikan Kode</label>
                        <input id="pendidikan_kode" required name="pendidikan_kode" class="form-control mb-3" type="text" placeholder="Kode">
                    </div>
                    <div class="form-label">
                        <label class="mb-2 required" for="pendidikan_nama"> Pendidikan Nama</label>
                        <input id="pendidikan_nama" required name="pendidikan_nama" class="form-control mb-3" type="text" placeholder="Nama">
                    </div>
                    <div class="form-group mt-5 d-flex justify-content-end">
                        <button type="button" onclick="onReset()" class="btn btn-light me-3"><i class="align-middle" data-feather="rotate-ccw"> </i> Reset</button>
                        <button type="submit" class="btn btn-success"><i class="align-middle" data-feather="save"> </i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tabel Pendidikan</div>
            </div>
            <div class="card-body">
                <div class="form-group d-flex justify-content-end mb-3">
                    <button type="button" onclick="initTable()" class="btn btn-primary"><i class="align-middle" data-feather="rotate-ccw"> </i> Refresh</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-row-bordered border align-middle rounded w-100" id="table_pendidikan">
                        <thead class="text-center">
                            <tr class="fw-bolder">
                                <th>No</th>
                                <th>Kode</th>
                                <th>Pendidikan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pendidikan::javascript')