<?php defined('KUNKEYPR') or die("ACCESS DENIED!");?>
<div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class="col-lg-10 card-wrapper">
          <!-- Headings -->
          <div class="card">
            <div class="card-header">
              <h3 class="mb-0">Tài Liệu Tích Hợp API</h3>
            </div>
            <div class="card-body">
                        <div class="container">
                            <p class="text-left">Quý khách lấy <b class="text-danger">key</b> tích hợp trong phần <a href="/thong-tin-tai-khoan"><b class="text-danger">thông tin tài khoản</b></a>.</p>
                            <p class="text-left">Quý khách vui lòng <a href="/Card_Exchange/tailieu-trumcard.zip"><b class="text-danger"> ấn vào đây </b></a> để tải document kết nối api.</p>
                            <div class="col-lg-12 col-md-12 col-xs-12 text-left">
                                
                                <h2 class="text-dark base-color" style="border-bottom: 2px solid #17a2b8"><b><span class="text-danger">Gửi Thẻ</span> - <span class="text-info">REQUEST API</span></b></h2>
                                
                                <br>
                                <p>GET URL:  <strong>https://trumCard.vn/Card_Exchange</strong></p>

<div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Gửi Thẻ - REQUEST API - Tham Số</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" align="center">Tham Số</th>       
                    <th scope="col" align="center">Ví Dụ</th>
                    <th scope="col" align="center">Chú Thích</th>
                  </tr>
                </thead>
                <tbody class="list">

                    <tr>
                        <td><b>key</b></td>
                        <td>2eac68c06da169a447a34522d6e67ce3</td>
                        <td>API Key khách hàng</td>
                    </tr>
                    <tr>
                        <td><b>card_type</b></td>
                        <td>VIETTEL</td>
                        <td>Điền đúng nhà mạng, viết Hoa</td>
                    </tr>
                    <tr>
                        <td><b>card_amount</b></td>
                        <td>10000</td>
                        <td>Mệnh giá thẻ nạp</td>
                    </tr>
                    <tr>
                        <td><b>card_code</b></td>
                        <td>215833723995241</td>
                        <td>Mã Thẻ</td>
                    </tr>
                    <tr>
                        <td><b>card_seri</b></td>
                        <td>10006456533871</td>
                        <td>Mã Seri</td>
                    </tr>
                    <tr>
                        <td><b>request_id</b></td>
                        <td>dãy số ngẫu nhiên vd: 24515356</td>
                        <td>Mã xác định đơn của đối tác</td>
                    </tr>
                    <tr>
                        <td><b>callback</b></td>
                        <td>https://domain.com/callback.php</td>
                        <td>Url Callback nhận dữ liệu sau khi xử lý thẻ</td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>

<br>
            <h2 class="text-dark base-color" style="border-bottom: 2px solid #17a2b8"><b><span class="text-danger">Giá Trị Trả Về</span> - <span class="text-info">RESPONSE API</span></b></h2>


<div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Giá Trị Trả Về - RESPONSE API</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" align="center">Tham Số</th>       
                    <th scope="col" align="center">Ví Dụ</th>
                    <th scope="col" align="center">Chú Thích</th>
                  </tr>
                </thead>
                <tbody class="list">
                    <tr>
                        <td><b>status</b></td>
                        <td>200</td>
                        <td>                    <p>status = 500 - Hệ thống bảo trì</p>
                                                <p>status = 100 - Nhập thiếu dữ liệu</p>
                                                <p>status = 300 - Không tồn tại API Key</p>
                                                <p>status = 301 - API Key chưa được kích hoạt</p>
                                                <p>status = 302 - API Key đã bị khóa</p>
                                                <p>status = 400 - Mã thẻ đã tồn tại</p>
                                                <p>status = 401 - Mệnh giá hoặc mã nhà mạng không tồn tại</p>
                                                <p>status = 403 - Lỗi hệ thống</p>
                                                <p>status = 200 - Gửi thẻ thành công</p>
                      </td>
                    </tr>
                    <tr>
                        <td><b>message</b></td>
                        <td>Gửi thẻ thành công</td>
                        <td>Message gửi lại mã lỗi API</td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>


<br>
            <h2 class="text-dark base-color" style="border-bottom: 2px solid #17a2b8"><b><span class="text-danger">Gửi lại thông tin</span> - <span class="text-info">CALLBACK PARTNER</span></b></h2>
            <p>Quý khách vui lòng gửi đúng tham số url callback khi gửi thẻ lên.</p>

            </p>Phương thức callback : <b>GET</b></p>


<div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Giá Trị Trả Về - RESPONSE API</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" align="center">Tham Số</th>       
                    <th scope="col" align="center">Ví Dụ</th>
                  </tr>
                </thead>
                <tbody class="list">
                    <tr data-index="0">
                        <td style="">
                           <b class="text-danger">status</b>
                        </td>
                        <td style="">
                           <p>status = 200 - Thẻ đúng</p>
                           <p>status = 201 - Thẻ sái mệnh giá</p>
                           <p>status = 100 - Thẻ sai</p>
                        </td>
                    </tr>
                    <tr data-index="1">
                        <td style="">
                            <b class="text-danger">pricesvalue</b>
                        </td>
                        <td style="">Mệnh giá đối tác gửi lên</td>
                    </tr>
                    <tr data-index="2">
                        <td style=""><b class="text-danger">value_receive</b>
                    </td>
                        <td style="">Mệnh giá đúng của thẻ
                    </td>
                    </tr>
                    <tr data-index="3">
                        <td style="">
                        <b class="text-danger">card_code</b>
                    </td>
                        <td style="">
                        Mã thẻ cào đã gửi lên
                    </td>
                    </tr>
                    <tr data-index="4">
                        <td style="">
                        <b class="text-danger">card_seri</b>
                    </td>
                        <td style="">Seri thẻ cào đã gửi lên
                    </td>
                    </tr>
                    <tr data-index="5">
                        <td style="">
                        <b class="text-danger">requestid</b>
                    </td>
                        <td style="">
                        Mã đơn hàng của đối tác gửi lên
                    </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
<br>
<p><b class="text-danger">Lưu ý:</b> Để phân biệt thẻ đúng và thẻ sai mệnh giá quý khách vui lòng so sánh mệnh giá gửi lên là <b class="text-danger">pricesvalue</b> và giá trị đúng của thẻ là <b class="text-danger">value_receive</b>.</p>

<br>


          </div>
        </div>
      </div>
</div>
</div>
</div>








