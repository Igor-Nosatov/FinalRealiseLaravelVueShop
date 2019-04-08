<template>
<div>
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
					<router-link :to="{ name: 'home' }" class="nav-link">Home<span class="lnr lnr-arrow-right"></span></router-link>
					<router-link :to="{ name: 'login' }" class="nav-link">Login<span class="lnr lnr-arrow-right"></span></router-link>
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
							<router-link :to="{ name: 'register' }" class="primary-btn" >Create an Account<span class="lnr lnr-arrow-right"></span></router-link>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form">
							<div class="col-md-12 form-group">
                <input id="email" type="email" class="form-control" v-model="email" 	name="name" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required autofocus>
							</div>
							<div class="col-md-12 form-group">
                <input id="password" type="password" class="form-control" v-model="password"  name="name" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn" @click="handleSubmit">Log In</button>
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
            data() {
                return {
                    email: "",
                    password: ""
                }
            },
            methods: {
                handleSubmit(e) {
                    e.preventDefault()
                    if (this.password.length > 0) {
                        let email = this.email
                        let password = this.password

                        axios.post('api/login', {email, password}).then(response => {
                            let user = response.data.user
                            let is_admin = user.is_admin

                            localStorage.setItem('shop.user', JSON.stringify(user))
                            localStorage.setItem('shop.jwt', response.data.token)

                            if (localStorage.getItem('shop.jwt') != null) {
                                this.$emit('loggedIn')
                                if (this.$route.params.nextUrl != null) {
                                    this.$router.push(this.$route.params.nextUrl)
                                } else {
                                    this.$router.push((is_admin == 1 ? 'admin' : 'shop'))
                                }
                            }
                        });
                    }
                }
            }
        }
    </script>
