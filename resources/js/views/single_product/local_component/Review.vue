<template>
<div class="row">
    <div class="col-lg-6">
        <div class="row total_rate">
            <div class="col-6">
                <div class="box_total">
                    <h5>Overall</h5>
                    <h4>4.0</h4>
                    <h6>(03 Reviews)</h6>
                </div>
            </div>
            <div class="col-6">
                <div class="rating_list">
                    <h3>Based on 3 Reviews</h3>
                    <ul class="list">
                        <li><a>5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a>4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a>3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a>2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                        <li><a>1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="review_list">
            <div class="review_item" v-for="rate in rating">
                <div class="media">
                    <div class="media-body">
                        <h4>{{rate.name}}</h4>
                        <div>

                            <div v-if="rate.star==5">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                            <div v-else-if="rate.star==4">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                            <div v-else-if="rate.star==3">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                            <div v-else-if="rate.star==2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                            <div v-else>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <p>{{rate.message}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="review_box">
            <form class="row contact_form" novalidate="novalidate">
                <h4>Add a Review</h4>
                <div class="col-md-12">
                    <div>
                        <input class="star star-1"  v-model="review.star" id="star-1" type="radio" name="star" value="1"/>
                        <label class="star star-1" for="star-1"></label>
                        <input class="star star-2"  v-model="review.star" id="star-2" type="radio" name="star" value="2"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-3"  v-model="review.star" id="star-3" type="radio" name="star" value="3"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-4"  v-model="review.star" id="star-4" type="radio" name="star" value="4"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-5"  v-model="review.star" id="star-5" type="radio" name="star" value="5"/>
                        <label class="star star-5" for="star-5"></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="review.name" placeholder="Your Full name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Full name'">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" class="form-control" v-model="review.email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="review.phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" v-model="review.message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button class="primary-btn" @click="addReview(review)">Submit Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['review_product'],
    data() {
        return {
            review: {
                star: '',
                name: '',
                email: '',
                phone: '',
                message: ''
            },
            rating: []
        }
    },
    methods: {
        addReview(review) {
            let url = `/api/product/review/add`
            axios.post(url, {
                star: review.star,
                name: review.name,
                phone: review.phone,
                email: review.email,
                message: review.message,
                product_id: this.review_product.id

            }).then(response => {
                console.log(response)
                this.star = ''
                this.name = ''
                this.phone = ''
                this.email = ''
                this.messsage = ''
                this.product_id = ''

            }).catch(error => {
                console.log(error)
            })
        }
    },
    mounted() {
        let url = `/api/product/${this.$route.params.id}`
        axios.get(url).then(response => {
            this.rating = response.data.review;
        }).catch(error => {
            console.log(error)
        });
    }
}
</script>
