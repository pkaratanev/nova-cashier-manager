<script type="text/ecmascript-6">
    export default {
        props: ['resourceName', 'resourceId', 'field'],

        data(){
            return {
                loading: true,
                user: null,
                subscription: null,
            }
        },


        computed: {
            basePath() {
                return Nova.config.base;
            }
        },


        mounted() {
            this.loadUserData();
        },


        methods: {
            loadUserData(){
                Nova.request().get(`/nova-cashier-tool-api/user/${this.resourceId}?brief=true`)
                        .then(response => {
                            this.user = response.data.user;
                            this.subscription = response.data.subscription;

                            this.loading = false;
                        });
            }
        }
    }
</script>

<template>
    <div>
        <h1 class="mb-3 text-90 font-normal text-2xl">Subscriptions</h1>

        <div class="card mb-6 py-3 px-6">
            <loading-view :loading="loading">
                <p class="text-90" v-if="!subscription">
                    No subscriptions
                </p>

                <div class="flex border-b border-40" v-if="subscription">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">Plan</h4></div>
                    <div class="w-3/4 py-4"><p class="text-90">
                        {{subscription.plan}}
                        ({{subscription.plan_amount / 100}} {{subscription.plan_currency}} / {{subscription.plan_interval}})
                    </p></div>
                </div>

                <div class="flex border-b border-40" v-if="subscription">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">Subscribed since</h4></div>
                    <div class="w-3/4 py-4"><p class="text-90">{{subscription.created_at}}</p></div>
                </div>

                <div class="flex border-b border-40" v-if="subscription">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">Billing Period</h4></div>
                    <div class="w-3/4 py-4"><p class="text-90">{{subscription.current_period_start}} => {{subscription.current_period_end}}</p></div>
                </div>

                <div class="flex border-b border-40 remove-bottom-border" v-if="subscription">
                    <div class="w-1/4 py-4"><h4 class="font-normal text-80">Status</h4></div>
                    <div class="w-3/4 py-4">
                        <p class="text-90">
                            <span v-if="subscription.on_grace_period">On Grace Period</span>
                            <span v-if="subscription.cancelled || subscription.cancel_at_period_end" class="text-danger">Cancelled</span>
                            <span v-if="subscription.active && !subscription.cancelled && !subscription.cancel_at_period_end">Active</span>
                            ·
                            <a class="text-primary no-underline" :href="basePath+'/cashier-tool/user/'+resourceId">
                                Manage
                            </a>
                        </p>
                    </div>
                </div>
            </loading-view>
        </div>
    </div>
</template>

<style>
    /* Scopes Styles */
</style>
