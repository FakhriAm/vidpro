<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Video List</h1>

          <!-- Video List Card -->
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#video_metadata" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-gray-800">Video List</h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="video_metadata">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Thumbnail</th>
                        <th>Video Title</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Uploaded by</th>
                        <th>Video Type</th>
                        <th>Video Price</th>
                        <th>Option</th>  
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Thumbnail</th>
                        <th>Video Title</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Uploaded by</th>
                        <th>Video Type</th>
                        <th>Video Price</th>
                        <th>Option</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <!-- <tr>
                        <td><img src="<?php echo base_url('asset/img/1.jpg')?>" class="img-thumbnail"></td>
                        <td>Video 1 Title</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                        <td>00:05:00</td>
                        <td>Ani</td>
                        <td>
                          <select name="customFilter_length" class="custom-select form-control form-control-sm mb-2">
                            <option>Select Video Type</option>
                            <option>Reguler</option>
                            <option>Silver</option>
                            <option>Gold</option>
                            <option>Platinum</option>
                          </select>
                        </td>
                        <td>
                          <select name="customFilter_length" class="custom-select form-control form-control-sm mb-2">
                            <option>Select Video Price</option>
                            <option>700.000</option>
                            <option>1.500.000</option>
                            <option>2.500.000</option>
                            <option>5.700.000</option>
                          </select>
                        </td>
                        <td>
                          <button class="btn btn-info btn-icon-split btn-sm" onclick="submitalert()">
                            <span class="icon text-white">
                              <i class="fas fa-check"></i>
                            </span>
                            <span class="text">
                              Submit
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo base_url('asset/img/2.jpg')?>" class="img-thumbnail"></td>
                        <td>Video 2 Title</td>
                        <td>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                        <td>00:04:30</td>
                        <td>Budi</td>
                        <td>
                          <select name="customFilter_length" class="custom-select form-control form-control-sm mb-2">
                            <option>Select Video Type</option>
                            <option>Reguler</option>
                            <option>Silver</option>
                            <option>Gold</option>
                            <option>Platinum</option>
                          </select>
                        </td>
                        <td>
                          <select name="customFilter_length" class="custom-select form-control form-control-sm mb-2">
                            <option>Select Video Price</option>
                            <option>700.000</option>
                            <option>1.500.000</option>
                            <option>2.500.000</option>
                            <option>5.700.000</option>
                          </select>
                        </td>
                        <td>
                          <button class="btn btn-info btn-icon-split btn-sm" onclick="submitalert()">
                            <span class="icon text-white">
                              <i class="fas fa-check"></i>
                            </span>
                            <span class="text">
                              Submit
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo base_url('asset/img/3.jpg')?>" class="img-thumbnail"></td>
                        <td>Video 3 Title</td>
                        <td>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                        <td>00:07:18</td>
                        <td>Caca</td>
                        <td>
                          <select name="customFilter_length" class="custom-select form-control form-control-sm mb-2">
                            <option>Select Video Type</option>
                            <option>Reguler</option>
                            <option>Silver</option>
                            <option>Gold</option>
                            <option>Platinum</option>
                          </select>
                        </td>
                        <td>
                          <select name="customFilter_length" class="custom-select form-control form-control-sm mb-2">
                            <option>Select Video Price</option>
                            <option>700.000</option>
                            <option>1.500.000</option>
                            <option>2.500.000</option>
                            <option>5.700.000</option>
                          </select>
                        </td>
                        <td>
                          <button class="btn btn-info btn-icon-split btn-sm" onclick="submitalert()">
                            <span class="icon text-white">
                              <i class="fas fa-check"></i>
                            </span>
                            <span class="text">
                              Submit
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo base_url('asset/img/4.jpg')?>" class="img-thumbnail"></td>
                        <td>Video 4 Title</td>                      <td>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</td>
                        <td>00:02:43</td>
                        <td>Dudu</td>
                        <td>
                          <select name="customFilter_length" class="custom-select form-control form-control-sm mb-2">
                            <option>Select Video Type</option>
                            <option>Reguler</option>
                            <option>Silver</option>
                            <option>Gold</option>
                            <option>Platinum</option>
                          </select>
                        </td>
                        <td>
                          <select name="customFilter_length" class="custom-select form-control form-control-sm mb-2">
                            <option>Select Video Price</option>
                            <option>700.000</option>
                            <option>1.500.000</option>
                            <option>2.500.000</option>
                            <option>5.700.000</option>
                          </select>
                        </td>
                        <td>
                          <button class="btn btn-info btn-icon-split btn-sm" onclick="submitalert()">
                            <span class="icon text-white">
                              <i class="fas fa-check"></i>
                            </span>
                            <span class="text">
                              Submit
                            </span>
                          </button>
                        </td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>