<template>
    <div >
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                  <button class="btn btn-success" data-toggle="modal" data-target="#create-item">
                     Add User <i class="fas fa-user-plus fa-fw"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  <tr v-for="(u, index) in user" :key="u.id">
                    <td>{{ index + 1}}</td>
                    <td>{{ u.name }}</td>
                    <td>{{ u.email }} </td>
                    <td><span class="tag tag-success">{{ u.type }}</span></td>
                    <td>
                        <a href="" @click.prevent="editUser(u)">
                            <i class="fa fa-edit"></i>
                        </a>
                        |
                        <a href="#" @click.prevent="deleteUser(u.id, index)">
                            <i class="fa fa-trash" ></i>
                        </a>
                    </td>
                  </tr>
                </table>

                <nav aria-label="Page navigation example">
                  <ul class="pagination" >
                    <li class="page-item" ><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item" v-for="page in pagesNumber" :key="page.id">
                      <a class="page-link" href="#" @click.prevent="changePage(page)"> {{ page }} </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
                </nav>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->

        <!-- Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tạo sản phẩm mới</h4>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="createUser">

                    <div class="form-group">
                      <label for="">Nhap vao ten user</label>
                      <input type="text" v-model="name" name="name" class="form-control">
                      <!-- @error('name') -->
                      <span class="text-danger" v-if="errors.name">
                        {{ errors.name[0] }}
                      </span>
                      <!-- @enderror -->
                    </div>

                    <div class="form-group">
                      <label for="">Nhap vao email</label>
                      <input type="text" v-model="email" name="email " class="form-control">
                      <span class="text-danger" v-if="errors.email">
                        {{ errors.email[0] }}
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="">Nhap vao mieu ta</label>
                      <input type="text" v-model="bio" name="bio" class="form-control">
                      <span class="text-danger" v-if="errors.bio">
                        {{ errors.bio[0] }}
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="">Kieu user</label>
                      <select name="type" v-model="type" id="type" class="form-control">
                        <option value="">Select User Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="author">Author</option>
                    </select>

                    </div>

                    <div class="form-group">
                      <label for="">Nhap vao passwrod</label>
                      <input type="text" v-model="pass" name="pass" class="form-control">
                      <span class="text-danger" v-if="errors.pass">
                        {{ errors.pass[0] }}
                      </span>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tạo sản phẩm mới</h4>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateUser(id)">

                    <div class="form-group">
                      <label for="">Nhap vao ten user</label>
                      <input type="text" v-model="name" name="name" class="form-control">
                      <!-- @error('name') -->
                      <span class="text-danger" v-if="errors.name">
                        {{ errors.name[0] }}
                      </span>
                      <!-- @enderror -->
                    </div>

                    <div class="form-group">
                      <label for="">Nhap vao email</label>
                      <input type="text" v-model="email" name="email " class="form-control">
                      <span class="text-danger" v-if="errors.email">
                        {{ errors.email[0] }}
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="">Nhap vao mieu ta</label>
                      <input type="text" v-model="bio" name="bio" class="form-control">
                      <span class="text-danger" v-if="errors.bio">
                        {{ errors.bio[0] }}
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="">Kieu user</label>
                      <select name="type" v-model="type" id="type" class="form-control">
                        <option value="">Select User Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="author">Author</option>
                    </select>

                    </div>

                    <div class="form-group">
                      <label for="">Nhap vao passwrod</label>
                      <input type="text" v-model="pass" name="pass" class="form-control">
                      <span class="text-danger" v-if="errors.pass">
                        {{ errors.pass[0] }}
                      </span>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data() {
        return {
          user: [],
          id: '',
          name: '',
          email: '',
          bio: '',
          type: '',
          pass: '',
          errors: [],
          pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
          },
          offset: 4
        }
      },
      computed: {
        pagesNumber() {
          if(!this.pagination.to) {
            return []
          }
          var from = this.pagination.current_page - this.offset;
          if(from < 1) {
            from = 1
          }
          var to = from + (this.offset * 2)
          if(to >= this.pagination.last_page) {
            to = this.pagination.last_page
          }
          var pagesArray = []
          while(from <= to) {
            pagesArray.push(from);
            from++
          }

          return pagesArray;
        }
      },
      // ready : function(){
      //     this.loadUser(this.pagination.current_page);
      // },
      mounted() {
          this.loadUser(this.pagination.current_page)
      },
      methods: {
        loadUser(page) {
          axios.get('users?page='+page)
          .then(response => {
            this.user = response.data.user.data
            this.pagination = response.data.pagination
          })
        },
        createUser() {
          this.errors = []
          axios.post('users', {
            name: this.name,
            email: this.email,
            bio: this.bio,
            type: this.type,
            pass: this.pass
          })
          .then(response => {
            this.name = ''
            this.email = ''
            this.bio = ''
            this.type= ''
            this.pass= ''
            $('#create-item').modal('hide');
            $(".modal-backdrop").remove();
            this.user.push(response.data.user)
          })
          .catch(error => {
            if (error.response.status == 422) {
              this.errors = error.response.data.errors;
              console.log(error.response.data.errors)
            }
          })
        },
        editUser(u) {
            this.id = u.id
            this.name = u.name;
            this.email= u.email;
            this.bio= u.bio;
            this.type = u.type;
            this.pass = u.pass;
            $('#edit-item').modal('show')
        },
        updateUser(id) {
          axios.put('users/' + id, {
            name: this.name,
            email: this.email,
            bio: this.bio,
            type: this.type,
            pass: this.pass,
          })
            .then(response => {
              this.user.push(response.data.user)
              $('#edit-item').modal('hide');
              $(".modal-backdrop").remove();
            })
            .catch(error => {
              console.log('loi')
            })
        },
        deleteUser(id, index) {
          if(confirm("Ban co muon xoa")) {
            axios.delete('users/' + id)
            .then(response => {
              this.user.splice(index, 1);
              console.log(response.data)
            })
            .catch(error => {
              console.log('loi')
            })
          }
        },
        changePage(page) {
          this.pagination.current_page = page;
          this.loadUser(page);
      }

      }
    }
</script>