<template>
<div>
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Contact Us</h1>
                    <nav class="d-flex align-items-center">
                        <router-link to="/" class="nav-link">Home<span class="lnr lnr-arrow-right"></span></router-link>
                        <router-link to="/contact" class="nav-link">Contact</router-link>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="contact_area section_gap_bottom">
        <div class="container">
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5431873.436061139!2d31.1788196!3d48.335885649999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1suk!2sua!4v1553524985159" width="100%" height="600" frameborder="0"
                  style="border:0" allowfullscreen></iframe>
            </div>
        </div><br>

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>California, United States</h6>
                            <p>Santa monica bullevard</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">00 (440) 9865 562</a></h6>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">support@colorlib.com</a></h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" v-model="contact.name" class="form-control" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
                        </div>
                        <div class="form-group">
                            <input type="email" v-model="contact.email" class="form-control" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                        </div>
                        <div class="form-group">
                            <input type="text" v-model="contact.subject" class="form-control" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" v-model="contact.message" rows="12" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
                        </div>
                        <button class="primary-btn" @click="addContactRequest(contact)">Send Message</button>
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
            contact: {
                name: '',
                email: '',
                subject: '',
                message: ''
            }
        }
    },
    methods: {
        addContactRequest(contact) {
            axios.post('/api/contact/add', {
                name: contact.name,
                email: contact.email,
                subject: contact.subject,
                message: contact.message
            }).then(response => {
                console.log(response)
                this.name = ''
                this.email = ''
                this.subject = ''
                this.message = ''
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>
