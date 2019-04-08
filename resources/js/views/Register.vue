<template>
<div>
        <section class="banner-area organic-breadcrumb">
          <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
              <div class="col-first">
                <h1>Register</h1>
                <nav class="d-flex align-items-center">
                  <router-link :to="{ name: 'home' }" class="nav-link">Home<span class="lnr lnr-arrow-right"></span></router-link>
                  <router-link :to="{ name: 'register' }" class="nav-link">Register<span class="lnr lnr-arrow-right"></span></router-link>
                </nav>
              </div>
            </div>
          </div>
        </section>

        <section class="login_box_area section_gap">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="login_box_img">
                  <img class="img-fluid" src="img/login.jpg" alt="">
                  <div class="hover">
                    <h4>New to our website?</h4>
                    <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                    <router-link :to="{ name: 'login' }" class="primary-btn" >Log In<span class="lnr lnr-arrow-right"></span></router-link>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="login_form_inner">
                  <h3>Log in to enter</h3>
                  <form class="row login_form">
                    <div class="col-md-12 form-group">
                      <input id="name" type="text" class="form-control" v-model="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required autofocus>
                    </div>
                    <div class="col-md-12 form-group">
                      <input id="email" type="email" class="form-control" v-model="email"  name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
                    </div>
                    <div class="col-md-12 form-group">
                      <input id="password" type="password" class="form-control" v-model="password" name="name" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
                    </div>
                    <div class="col-md-12 form-group">
                      <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" placeholder="Password confirm" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password confirm'" required>
                    </div>
                    <div class="col-md-12 form-group">
                      <button type="submit" value="submit" class="primary-btn" @click="handleSubmit">Register</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        </div>
    </template>

    <script>
    export default {
        props : ['nextUrl'],
        data(){
            return {
                name : "",
                email : "",
                password : "",
                password_confirmation : ""
            }
        },
        methods : {
            handleSubmit(e) {
                e.preventDefault()
                if (this.password !== this.password_confirmation || this.password.length <= 0) {
                    this.password = ""
                    this.password_confirmation = ""
                    return alert('Passwords do not match')
                }
                let name = this.name
                let email = this.email
                let password = this.password
                let c_password = this.password_confirmation
                axios.post('api/register', {name, email, password, c_password}).then(response => {
                    let data = response.data
                    localStorage.setItem('shop.user', JSON.stringify(data.user))
                    localStorage.setItem('shop.jwt', data.token)
                    if (localStorage.getItem('shop.jwt') != null) {
                        this.$emit('loggedIn')
                        let nextUrl = this.$route.params.nextUrl
                        this.$router.push((nextUrl != null ? nextUrl : '/'))
                    }
                })
            }
        }
    }
    </script>
