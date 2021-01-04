 <div class="row ">
        <div class="col-lg-2">
          <h3>Danh sách nhân viên</h3>   
        </div>
        <div class="col-lg-8 mt-12" >
        
        
                            <div class="input-group col-md-12">
                                <input type="text" id="search_input" value="" ng-model="search_input" class="form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button ng-click="std_ctrl.search_data(search_input)" class="button button-green" type="button">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                    
       </div>
          <div class="col-lg-2 ">
              <button type="button" class="button button-purple mt-12 pull-right" data-toggle="modal" data-target="#create_sinhvien_info_modal"> Tạo nhân viên</button> 
      
          </div>
    </div>



<p class="{{std_ctrl.alert_class}}">{{std_ctrl.msg}}</p>
<table class="table">
            <thead>
                <tr>                  
                    <th width = "10%" class="text-center">Mã NV</th>  
                    <th width = "10%">Tên NV</th>
                    <th width = "20%">Địa chỉ</th>
                    <th width = "20%">Điện thoại</th>
                    <th width = "10%">Lương</th>
                    <th width = "10%">Loại NV</th>
                    <th  class="text-right">Hành động</th>
                </tr>
            </thead>
            <tbody>
                
          
                <tr ng-repeat="sinhviens in std_ctrl.sinhvien_list">
                  
                    <td width = "10%" align="center">{{sinhviens.MANV}}</td>
                    <td width = "10%">{{sinhviens.TEN}}</td>
                    <td width = "20%">{{sinhviens.DCHI}}</td>
                    <td width = "20%">{{sinhviens.DTHOAI}}</td>
                    <td width = "10%" >{{sinhviens.LUONG}}</td>    
                    <td width = "10%">{{sinhviens.LOAINV}}</td>
                 
                <td  class="text-right">
                 
                    <button type="button"  data-toggle="modal"  class="button button-red" ng-click="std_ctrl.delete_sinhvien_info(sinhviens.SV_id)">Delete</button> 
                  
                    <button  type="button" data-toggle="modal" data-target="#edit_sinhvien_info_modal"  class="button button-blue" ng-click="std_ctrl.edit_sinhvien_info(sinhviens.MANV)">Edit</button> 
                  
                    <button type="button" data-toggle="modal" data-target="#view_sinhvien_info_modal"  class="button button-green" ng-click="std_ctrl.get_sinhvien_info(sinhviens.SV_id)">View</button> 

                    
                
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
          <h2 class="modal-title">Tạo mới nhân viên</h2>
        </div>
        <div class="modal-body">
         
           <form method="post"  id="create_sinhvien_info_frm" ng-submit="std_ctrl.addsinhvien(sinhvien)" >
            <div class="form-group">
                <label for="sinhvien_name">Mã nhân viên:</label>
                <input type="text" ng-model="sinhvien.manv" id="manv" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="email_address">Tên Nhân Viên:</label>
                <input type="text" class="form-control" ng-model="sinhvien.tennv" id="tennv" required maxlength="50">
            </div>
            
            <div class="form-group">
                <label for="country">Địa chỉ:</label>
                <input type="text" name="diachi" ng-model="sinhvien.diachi" id="Quocgia" class="form-control"  maxlength="50">
            </div>

            <div class="form-group">
                <label for="contact">Điện thoại:</label>
                <input type="text" class="form-control" ng-model="sinhvien.dienthoai" id="dienthoai"  maxlength="50">
            </div>
             
            <div class="form-group">
                <label for="country">Lương nhân viên:</label>
                <input type="text" name="country" ng-model="sinhvien.luongnv" id="luongnv" class="form-control"  maxlength="50">
            </div>
            
            <div class="form-group">
              <label for="gender">Loại nhân viên:</label>
              <select class="form-control" ng-model="sinhvien.loainv" id="gioitinh">
                  <option value="" selected>Select</option>
                  <option value="0" >0</option>
                  <option value="1" >1</option>
              </select>
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
          <h3 class="modal-title">Thông tin sửa || {{std_ctrl.sinhvien_info.MANV}} </h3>
        </div>
        <div class="modal-body" >
         
            <form method="post"  id="edit_sinhvien_info_frm" name="edit_sinhvien_info_frm" ng-submit="std_ctrl.updatesinhvien()">
                   <input ng-model="std_ctrl.sinhvien_info.manv" type="hidden" />
            <div class="form-group">
                <label >Tên nhân viên</label>
                <input type="text" ng-model="std_ctrl.sinhvien_info.TEN"  class="form-control" required maxlength="50">
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
          <h4 class="modal-title">Thông tin nhân viên</h4>
        </div>
        <div class="modal-body" >
         
                 
            <div class="form-group">
                <label >Mã nhân viên:</label>
                {{std_ctrl.view_sinhvien_info.manv}}
               
            </div>
            <div class="form-group">
                <label >Tên nhân viên:</label>
                  {{std_ctrl.view_sinhvien_info.tennv}}\
            </div>

            <div class="form-group">
              <label >Địa chỉ:</label>
                       {{std_ctrl.view_sinhvien_info.diachi}}
         
              
            </div> 

            <div class="form-group">
                <label >Điện thoại:</label>
                     {{std_ctrl.view_sinhvien_info.dienthoai}}
             
            </div>
            
            <div class="form-group">
                <label >Lương:</label>
                    {{std_ctrl.view_sinhvien_info.luongnv}}
               
            </div>
          
            
            <div class="form-group">
                <label >Loại nhân viên:</label>
                    {{std_ctrl.view_sinhvien_info.loainv}}
               
            </div>
        
    
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
