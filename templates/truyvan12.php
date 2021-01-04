 <div class="row ">
        <div class="col-lg-2">
          <h3>Danh Sách Nhan Vien</h3>
        
        </div>
        <div class="col-lg-8 mt-12" >
        
        
                            <div class="input-group col-md-12">
                                <input type="text" id="search_input" value="" ng-model="search_input" class="form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button ng-click="std_ctrl12.search_data(search_input)" class="button button-green" type="button">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                    
       </div>
          <div class="col-lg-2 ">
              <button type="button" class="button button-purple mt-12 pull-right" data-toggle="modal" data-target="#create_sinhvien_info_modal"> Tạo Nhân Viên</button> 
      
          </div>
    </div>



<p class="{{std_ctrl12.alert_class}}">{{std_ctrl12.msg}}</p>    
<table class="table">
            <thead>
                <tr>
                     <th width = "10%">STT</th>                  
                    <th width = "10%" class="text-center">Mã NV</th>  
                    <th width = "20%">Mã CB</th>
                    <th width = "20%">TEN</th>
                    <th  class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                
          
                <tr ng-repeat="sinhviens in std_ctrl12.sinhvien_list">
                  
                    <td width = "10%" >{{$index + 1}}</td>
                     <td width = "10%" align="center">{{sinhviens.MANV}}</td>
                    <td width = "20%">{{sinhviens.MACB}}</td>
                    <td width = "20%">{{sinhviens.TEN}}</td>
                    <!-- <td width = "10%" >{{sinhviens.DIENTHOAI}}</td>                  -->
                    
                 
                <td  class="text-right">
                 
                    <button type="button"  data-toggle="modal"  class="button button-red" ng-click="std_ctrl12.delete_sinhvien_info(sinhviens.MAKH)">Delete</button> 
                  
                    <button  type="button" data-toggle="modal" data-target="#edit_sinhvien_info_modal"  class="button button-blue" ng-click="std_ctrl12.edit_sinhvien_info(sinhviens.MAKH)">Edit</button> 
                  
                    <button type="button" data-toggle="modal" data-target="#view_sinhvien_info_modal"  class="button button-green" ng-click="std_ctrl12.get_sinhvien_info(sinhviens.MAKH)">View</button> 

                    
                
                </td>
                    
                    
                    
                </tr>
                
                
                

           </tbody>
        </table>
    

<div class="pull-right">

    <pagination 
      ng-model="currentPage"
      total-items="total_row"
      max-size="maxSize"  
      boundary-links="true">
    </pagination>
</div>

   <div class="modal fade" id="create_sinhvien_info_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Tạo mới sinh viên</h2>
        </div>
        <div class="modal-body">
         
           <form method="post"  id="create_sinhvien_info_frm" ng-submit="std_ctrl12.addsinhvien(sinhvien)" >
            <div class="form-group">
                <label for="sinhvien_name">Họ và Tên:</label>
                <input type="text" ng-model="sinhvien.hovaten" id="hovaten" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="email_address">Email:</label>
                <input type="email" class="form-control" ng-model="sinhvien.email" id="email" required maxlength="50">
            </div>

            <div class="form-group">
              <label for="gender">Giới tính:</label>
              <select class="form-control" ng-model="sinhvien.gioitinh" id="gioitinh">
                  <option value="" selected>Select</option>
                  <option value="Male" >Nam</option>
                  <option value="Female" >Nữ</option>
              </select>
            </div>

            <div class="form-group">
                <label for="contact">Địa chỉ:</label>
                <input type="text" class="form-control" ng-model="sinhvien.Diachi" id="Diachi"  maxlength="50">
            </div>
             
            <div class="form-group">
                <label for="country">Quốc gia:</label>
                <input type="text" name="country" ng-model="sinhvien.Quocgia" id="Quocgia" class="form-control"  maxlength="50">
            </div>
                <div class="form-group mb-50">
            <input type="submit" class="button button-green  pull-right"  value="Submit"/>
                </div>
                
        </form> 
    
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 


  <div class="modal fade" id="edit_sinhvien_info_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Thông tin sửa || {{std_ctrl12.sinhvien_info.TEN}} </h3>
        </div>
        <div class="modal-body" >
         
            <form method="post"  id="edit_sinhvien_info_frm" name="edit_sinhvien_info_frm" ng-submit="std_ctrl12.updatesinhvien()">
                   <input ng-model="std_ctrl12.sinhvien_info.MAKH" type="hidden" />
            <div class="form-group">
                <label >Họ và Tên</label>
                <input type="text"  ng-model="std_ctrl12.sinhvien_info.TEN"  class="form-control" required maxlength="50">
            </div>
            
                <div class="form-group mb-50">
            <input type="submit"  class="button button-green  pull-right"  value="Update"/>
                </div>
                
        </form> 
    
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 


 <div class="modal fade" id="view_sinhvien_info_modal" role="dialog">
    <div class="modal-dialog">
    



      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thông tin sinh viên </h4>
        </div>
        <div class="modal-body" >
         
                 
            <div class="form-group">
                <label >Họ và tên:</label>
                {{std_ctrl12.view_sinhvien_info.hovaten}}
               
            </div>
            <div class="form-group">
                <label >Địa chỉ Email:</label>
                  {{std_ctrl12.view_sinhvien_info.email}}
              
            </div>

            <div class="form-group">
              <label >Giới tính:</label>
                       {{std_ctrl12.view_sinhvien_info.gioitinh}}
         
              
            </div> 

            <div class="form-group">
                <label >Địa chỉ:</label>
                     {{std_ctrl12.view_sinhvien_info.Diachi}}
             
            </div>
            
            <div class="form-group">
                <label >Quốc gia:</label>
                    {{std_ctrl12.view_sinhvien_info.Quocgia}}
               
            </div>
          
        
    
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
