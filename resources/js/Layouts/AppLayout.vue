<template>
    <div>
        <Head :title="title" />
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('welcome')">
                                    Devs Shop
                                </Link>
                            </div>

                           
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                        
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <div class="flex items-center space-x-3 relative">
                                    <link :href="route('dashboard')" class="hover:text-yellow-500 transition" v-if="$page.props.user">
                                        Dashboard
                                    <link>
                                    <template v-else>
                                        <link :href="route('register')" class="hover:text-yellow-500 transition">
                                        Register

                                         <link :href="route('login')" class="hover:text-yellow-500 transition">
                                        Login
                                    </template>
                                     <link :href="route('#')" class="hover:text-yellow-500 transition">
                                        Shop

                                        <form action="POST" @submit. prevent="logout" v-if="$page.props.user">
                                            <button class="hover:text-yellow-500 transition">
                                                Log Out
                                            </button>
                                        </form>
                                        <link :href="route('#')" class="hover:text-red-700 transition">
                                        <span class="bg red-600 text-white text-xs rounded-md p-1 absolute" style="top: -10px; right: -8px;">
                                            3
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" 
                                            aria-hidden="true" 
                                            role="img"
                                            class="w-4 h-4 fill-current svg-inline--fa fa-shopping-cart fa-w-18"
                                            width="1.19em" 
                                            height="1em" 
                                            preserveAspectRatio="xMidYMid meet" 
                                            viewBox="0 0 1664 1408">
                                            <path fill="currentColor" d="M640 1280q0 52-38 90t-90 38t-90-38t-38-90t38-90t90-38t90 38t38 90zm896 0q0 52-38 90t-90 38t-90-38t-38-90t38-90t90-38t90 38t38 90zm128-1088v512q0 24-16.5 42.5T1607 768L563 890q13 60 13 70q0 16-24 64h920q26 0 45 19t19 45t-19 45t-45 19H448q-26 0-45-19t-19-45q0-11 8-31.5t16-36t21.5-40T445 951L268 128H64q-26 0-45-19T0 64t19-45T64 0h256q16 0 28.5 6.5T368 22t13 24.5t8 26t5.5 29.5t4.5 26h1201q26 0 45 19t19 45z"/>
                                        </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <template v-if="$page.props.user">
                        <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </jet-responsive-nav-link>
                    </div>
                    
                    </template v-else>
                         <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('register')">
                            Register
                        </jet-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('login')">
                            Login
                        </jet-responsive-nav-link>
                    </div>   
                    </template>

                    <div class="pt-2 pb-3 space-y-1">
                        <link href="#">
                        </link>
                    </div>   

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </jet-responsive-nav-link>

                            <jet-responsive-nav-link :href="route('api-tokens.index')" :active="route().current('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                API Tokens
                            </jet-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <jet-responsive-nav-link as="button">
                                    Log Out
                                </jet-responsive-nav-link>
                            </form>

                            <!-- Team Management -->
                            <template v-if="$page.props.jetstream.hasTeamFeatures">
                                <div class="border-t border-gray-200"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Team
                                </div>

                                <!-- Team Settings -->
                                <jet-responsive-nav-link :href="route('teams.show', $page.props.user.current_team)" :active="route().current('teams.show')">
                                    Team Settings
                                </jet-responsive-nav-link>

                                <jet-responsive-nav-link :href="route('teams.create')" :active="route().current('teams.create')" v-if="$page.props.jetstream.canCreateTeams">
                                    Create New Team
                                </jet-responsive-nav-link>

                                <div class="border-t border-gray-200"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Switch Teams
                                </div>

                                <template v-for="team in $page.props.user.all_teams" :key="team.id">
                                    <form @submit.prevent="switchToTeam(team)">
                                        <jet-responsive-nav-link as="button">
                                            <div class="flex items-center">
                                                <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <div>{{ team.name }}</div>
                                            </div>
                                        </jet-responsive-nav-link>
                                    </form>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        props: {
            title: String,
        },

        components: {
            Head,
            JetApplicationMark,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    })
</script>
