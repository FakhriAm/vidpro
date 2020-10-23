<!-- Content Wrapper. Contains page content -->
<style>
  .stat {
    height: 400px;
  }

  .card-title,
  select {
    font-size: small;
  }
</style>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- Content Header (Page header) -->
  <section class="content">
    <div class="container-fluid filter-container">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <?php if (isset($flashdata['type'])) : ?>
            <div class="alert <?= ($flashdata['type']) ? 'alert-success' : 'alert-warning' ?>"><i class="fa fa-info-circle mr-1"></i><strong>Information!</strong> <?= $flashdata['info'] ?></div>
          <?php endif ?>
        </div>
        <div class="col-12 mb-2">
          <div class="btn-group">
            <a href="javascript:;" class="btn btn-sm btn-outline-primary active all-item" data-filter="all">All Stat</a>
            <a href="javascript:;" class="btn btn-sm btn-outline-primary" data-filter="1">Video Mandatory</a>
            <a href="javascript:;" class="btn btn-sm btn-outline-primary" data-filter="2">Request</a>
          </div>
        </div>
      </div>
      <div class="row filter-item filter-item-1">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Latest Video Mandatory</div>
            </div>
            <div class="card-body">
              <div class="stat" id="stat-video-mandatory"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Latest Video Mandatory by Category</div>
            </div>
            <div class="card-body">
              <div class="stat" id="stat-video-mandatory-by-category"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="row-fluid">
                <div class="col-xs-9 card-title">
                  Latest Video Mandatory by Category and Company
                </div>
                <div class="col-xs-3 float-right">
                  <select name="companyCategory" id="">
                    <option value="">Pilihan</option>
                    <?php foreach ($company as $row) : ?>
                      <option <?= ($company[0]->id == $row->id) ? 'selected' : null ?> value="<?= $row->id ?>"><?= $row->content ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="stat" id="stat-video-mandatory-by-category-and-company"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Latest Video Mandatory by Uploader</div>
            </div>
            <div class="card-body">
              <div class="stat" id="stat-video-mandatory-by-uploader"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="row-fluid">
                <div class="col-xs-12">
                  <div class="card-title">History Video Mandatory Yearly</div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="stat" id="stat-history-video-mandatory-yearly"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="row-fluid">
                <div class="col-xs-9">
                  <div class="card-title">History Video Mandatory Monthly</div>
                </div>
                <div class="col-xs-3">
                  <div class="float-right">
                    <select name="vmMonthly" id="">
                      <option value="">Pilihan</option>
                      <?php for ($i = (date('Y', time()) - 4); $i <= date('Y', time()); $i++) : ?>
                        <option <?= date('Y', time()) == $i ? 'selected' : null ?> value="<?= $i ?>"><?= $i ?></option>
                      <?php endfor ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="stat" id="stat-history-video-mandatory-monthly"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="row-fluid">
                <div class="col-xs-12">
                  <div class="card-title">History Video Mandatory by Category Yearly</div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="stat" id="stat-history-video-mandatory-by-category-yearly"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="row-fluid">
                <div class="col-xs-9">
                  <div class="card-title">History Video Mandatory by Category Monthly</div>
                </div>
                <div class="col-xs-3">
                  <div class="float-right">
                    <select name="vmMonthly" id="">
                      <option value="">Pilihan</option>
                      <?php for ($i = (date('Y', time()) - 4); $i <= date('Y', time()); $i++) : ?>
                        <option <?= date('Y', time()) == $i ? 'selected' : null ?> value="<?= $i ?>"><?= $i ?></option>
                      <?php endfor ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="stat" id="stat-history-video-mandatory-by-category-monthly"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row filter-item filter-item-2" data-category="2">
        <div class="col-md-8">
          <div class="card" id="id-latest-request">
            <div class="card-header">
              <div class="row-fluid">
                <div class="col-xs-9">
                  <div class="card-title">Latest Request (Top Ten)</div>
                </div>
                <div class="col-xs-3">
                  <div class="float-right">
                    <select name="vmLatestRequest" id="">
                      <option value="">Pilihan</option>
                      <?php for ($i = (date('Y', time()) - 4); $i <= date('Y', time()); $i++) : ?>
                        <option <?= date('Y', time()) == $i ? 'selected' : null ?> value="<?= $i ?>"><?= $i ?></option>
                      <?php endfor ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0" id="latest-request">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Company Request</th>
                      <th>Request Program</th>
                      <th>Company Recieve</th>
                      <th>Date Request</th>
                      <th>Date Upload</th>
                      <th>Gap Time</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" id="id-company-request" style="overflow-y: scroll;">
          <?php foreach ($company as $row) : ?>
            <div class="info-box mb-3 bg-light">
              <span class="info-box-icon"><img src="<?= base_url('public/dist/img/ico-' . $row->content_links . '.png') ?>" alt='' /></span>

              <div class="info-box-content">
                <span class="info-box-text"><?= $row->content ?></span>
                <span class="info-box-number">
                  Total Upload: <span class="upload-ibn-<?= $row->id ?>"></span><br />
                  Total Request: <span class="request-ibn-<?= $row->id ?>"></span><br />
                  Gaptime Upload: <span class="gaptime-ibn-<?= $row->id ?>"></span>
                </span>
              </div>
            </div>
          <?php endforeach ?>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="row-fluid">
                <div class="col-xs-9">
                  <div class="card-title">Request vs Upload by Company Yearly</div>
                </div>
                <div class="col-xs-3">
                  <div class="float-right">
                    <select name="vmMonthly" id="">
                      <option value="">Pilihan</option>
                      <?php for ($i = (date('Y', time()) - 4); $i <= date('Y', time()); $i++) : ?>
                        <option <?= date('Y', time()) == $i ? 'selected' : null ?> value="<?= $i ?>"><?= $i ?></option>
                      <?php endfor ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="stat" id="stat-request-v-company-yearly"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper