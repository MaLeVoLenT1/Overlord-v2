//import Vue from 'vue';

const App =  {
    name: 'Dashboard',
    data(){
        return{
            location:  ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['page'] :  null),
            user: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['user'] : null),
            requests: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['request'] :  null),
            section: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['section'] :  null),
            userConfig:{
                isSignedIn: false,
                overlord_rank: '',
                belongsToOrg:false,
                belongsToCommunity: false,
                belongsToTeam: false,
                isOrgLeader: false,
                isCommunityLeader: false,
                isTeamLeader: false,
            },
            hudControls:{
                mainHud: false,
                pageHud: false,
                sideHud: false,
                search:'',
            },
            metrics:{
                window:{ scrollDistance:0},
                sideNav:{ top:0, left:0 },
                pageNav:{}
            },
            interfaces:{
                news:{
                    home:{
                        style:"normal", background:"transparent",
                        hasMenu: true, topBar: true, bottomBar: true
                    },
                    target:{
                        style:"full", background:"matt",
                        hasMenu: true, topBar: false, bottomBar: false
                    },
                    create: {
                        style:"full", background:"matt",
                        hasMenu: true, topBar: false, bottomBar: false
                    },
                    hub:{
                        style:"normal", background:"transparent",
                        hasMenu: true, topBar: true, bottomBar: true
                    },
                    overlord:{
                        style:"normal", background:"transparent",
                        hasMenu: true, topBar: true, bottomBar: true
                    },
                    crypto:{
                        style:"normal", background:"transparent",
                        hasMenu: true, topBar: true, bottomBar: true
                    },
                    games:{
                        style:"normal", background:"transparent",
                        hasMenu: true, topBar: true, bottomBar: true
                    },
                },
                hub:{
                    home:{
                        style:"normal", background:"transparent",
                        hasMenu: true, topBar: true, bottomBar: true
                    },
                    teams:{
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    organizations: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    communities: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    members: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                },
                about:{
                    home:{
                        style:"normal", background:"transparent",
                        hasMenu: true, topBar: true, bottomBar: true
                    },
                    discord: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    faq:{
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    overlord:{
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    privacy:{
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    terms:{
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    contact:{
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    crypto:{

                    },
                    sitemap: {

                    },
                },
                crypto:{
                    home:{
                        style:"normal", background:"transparent",
                        hasMenu: true, topBar: true, bottomBar: true
                    },
                    news:{
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    livePrices: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    liveCharts: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    mining: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    defi: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    wallets: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    exchanges: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    tools: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    events: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    blockchains: {
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                    education:{
                        home:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        statistics:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        },
                        target:{
                            style:"full", background:"matt",
                            hasMenu: true, topBar: false, bottomBar: false
                        }
                    },
                },
                games:{
                    home:{
                        style:"normal", background:"transparent",
                        hasMenu: true, topBar: true, bottomBar: true
                    },
                },
                home:{}

            },
            links:[
                {
                    name:"hub",
                    pages:{
                        home:{
                            type:"image",
                            sorting:"second",
                            abbreviation:"Community",
                            text:"Community Home",
                            href:'community',
                            portal:"community",
                            active:false,
                            links:[
                                {type: "top", name: "make",  text:"Register", active:false, stickyShow:true},
                                {type: "top", name: "search",  text:"Find", active:false, stickyShow:true},
                                {type: "top", name: "newest",  text:"Newest", active:false, stickyShow:false},
                                {type: "top", name: "featured",  text:"Featured", active:false, stickyShow:false}
                            ],
                            authenticated:[
                                {
                                    title: "Your Page", name: "user-page",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "my-page",  text:"My Page", active:false},
                                    ]
                                },
                                {
                                    title: "Friends", name: "friends",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Owned Guilds", name: "owned-guilds",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Your Guilds", name: "your-guilds",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Owned Alliances", name: "owned-alliances",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Your Alliances", name: "user-alliances",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Owned Hubs", name: "owned-hubs",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Your Community Hub", name: "user-hub",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                            ]
                        },
                        teams:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Teams",
                            text:"Teams",
                            href:'hub/teams',
                            portal:"hub",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "search",  text:"Detailed Search", active:false, stickyShow:true},
                                {type: "top", name: "newest",  text:"Newest teams", active:false, stickyShow:false},
                                {type: "top", name: "highlights",  text:"Team Highlights", active:false, stickyShow:false}
                            ],
                            authenticated:[
                                {
                                    title: "Owned Alliances", name: "owned-alliances",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Your Alliances", name: "user-alliances",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Allied Guilds", name: "allied-guilds",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                            ]
                        },
                        organizations:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Orgs",
                            text:"Organizations",
                            href:'hub/organizations',
                            portal:"hub",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "search",  text:"Detailed Search", active:false, stickyShow:true},
                                {type: "top", name: "newest",  text:"Newest Org", active:false, stickyShow:false},
                                {type: "top", name: "highlights",  text:"Org Performance Highlights", active:false, stickyShow:false}
                            ],
                            authenticated:[
                                {
                                    title: "Owned Organizations", name: "owned-orgs",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Your Organization", name: "your-orgs",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Allied Organizations", name: "allied-orgs",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Friendly Organizations", name: "friendly-orgs",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                            ]
                        },
                        communities:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Communities",
                            text:"Communities",
                            href:'hub/communities',
                            portal:"hub",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "search",  text:"Detailed Search", active:false, stickyShow:true},
                                {type: "top", name: "newest",  text:"Newest community", active:false, stickyShow:false},
                                {type: "top", name: "highlights",  text:"community Highlights", active:false, stickyShow:false}
                            ],
                            authenticated:[
                                {
                                    title: "Owned communities", name: "owned-communities",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Your Community", name: "your-community",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                            ]
                        },
                        members:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Members",
                            text:"Community Members",
                            href:'community/members',
                            portal:"community",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "search",  text:"Detailed Search", active:false, stickyShow:true},
                                {type: "top", name: "newest",  text:"Newest Overlord Member", active:false, stickyShow:false},
                                {type: "top", name: "highlights",  text:"Outstanding Members", active:false, stickyShow:false}
                            ],
                            authenticated:[
                                {
                                    title: "Your Page", name: "user-page",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "my-page",  text:"My Page", active:false},
                                    ]
                                },
                                {
                                    title: "Friends", name: "friends",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                            ]
                        },
                    }
                },
                {
                    name:"crypto",
                    pages:{
                        home:{
                            type:"image",
                            sorting:"second",
                            abbreviation:"Crypto",
                            text:"Cryptocurrencies",
                            href:'crypto',
                            portal:"crypto",
                            active:false,
                            links:[
                                {type: "top", name: "list",  text:"Crypto List", active:false, stickyShow:true},
                                {type: "top", name: "pos",  text:"Proof-of-Stake", active:false, stickyShow:true},
                                {type: "top", name: "pow",  text:"Proof-of-Work", active:false, stickyShow:false},
                                {type: "top", name: "defi",  text:"Decentralized Finance", active:false, stickyShow:false}
                            ],
                            authenticated:[
                                {
                                    title: "portfolio", name: "portfolio",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "my-page",  text:"My Page", active:false},
                                    ]
                                },
                            ]
                        },
                        livePrices:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Live Prices",
                            text:"Live Prices",
                            href:'crypto/live-prices',
                            portal:"crypto",
                            active:false,
                            links:[
                                {type: "top", name: "proof-of-stake",  text:"Proof Of Stake", active:false, stickyShow:true},
                                {type: "top", name: "proof-of-work",  text:"Proof Of Work", active:false, stickyShow:true},
                                {type: "top", name: "stable-coins",  text:"Stable Coins", active:false, stickyShow:false},
                                {type: "top", name: "cefi",  text:"Centralized Finance", active:false, stickyShow:false},
                                {type: "top", name: "defi",  text:"Decentralized Finance", active:false, stickyShow:false}
                            ],
                            authenticated:[
                                {
                                    title: "Owned Cryptos", name: "owned-cryptos",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Portfolio", name: "user-portfolio",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Watch List", name: "watch-lists",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                            ]
                        },
                        liveCharts:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Live Charts",
                            text:"Live Charts",
                            href:'crypto/live-charts',
                            portal:"crypto",
                            active:false,
                            links:[],
                            authenticated:[]
                        } ,
                        mining:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"mining",
                            text:"Crypto Mining (PoW)",
                            href:'crypto/crypto-mining',
                            portal:"hub",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "difficulty-ranks",  text:"Mining Difficulty", active:false, stickyShow:true},
                                {type: "top", name: "hash-rate-rank",  text:"Hash Rates", active:false, stickyShow:false},
                                {type: "top", name: "profitability-calculator",  text:"Profit Calculator", active:false, stickyShow:false}
                            ],
                            authenticated:[
                                {
                                    title: "My Farm", name: "my-farm",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },

                            ]
                        },
                        defi:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"DEFI",
                            text:"Decentralized Finance",
                            href:'crypto/defi',
                            portal:"hub",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "ethereum",  text:"Ethereum", active:false, stickyShow:true},
                                {type: "top", name: "bsc",  text:"Binance Smart-Chain", active:false, stickyShow:false},
                                {type: "top", name: "cardano",  text:"Cardano", active:false, stickyShow:false},
                                {type: "top", name: "solana",  text:"Solana", active:false, stickyShow:false},
                                {type: "top", name: "cosmos",  text:"Cosmos", active:false, stickyShow:false}
                            ],
                            authenticated:[
                                {
                                    title: "My Liquidity Pools", name: "my-lps",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "My Lending Pools", name: "my-lending-pools",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "My Staking Pools", name: "my-staking-pools",
                                    active:false, stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                            ]
                        },
                        blockchains:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Blockchains",
                            text:"Blockchains",
                            href:'crypto/blockchains',
                            portal:"crypto",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "search",  text:"Detailed Search", active:false, stickyShow:true},
                            ],
                            authenticated:[


                            ]
                        },
                        exchanges:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Exchanges",
                            text:"Exchanges",
                            href:'crypto/exchanges',
                            portal:"crypto",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                        wallets:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Wallets",
                            text:"Wallets",
                            href:'crypto/wallets',
                            portal:"crypto",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                        tools:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Tools",
                            text:"Tools",
                            href:'crypto/tools',
                            portal:"crypto",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                        events:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Events",
                            text:"Events",
                            href:'crypto/events',
                            portal:"crypto",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                        news:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"News",
                            text:"News",
                            href:'crypto/news',
                            portal:"crypto",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                        blockchain:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Blockchain",
                            text:"Blockchain",
                            href:'crypto/blockchain',
                            portal:"crypto",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                        education:{
                            type:"link",
                            sorting:"second",
                            abbreviation:"Education",
                            text:"Education",
                            href:'crypto/education',
                            portal:"crypto",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                    }
                },
                {
                    name:'gaming',
                    pages:{
                        home:{
                            type:"image",
                            sorting:"second",
                            abbreviation:"Gaming",
                            text:"Gaming",
                            href:'gaming',
                            portal:"gaming",
                            active:false,
                            links:[
                                {type: "top", name: "list",  text:"Gaming List", active:false, stickyShow:true},
                                {type: "top", name: "FPS",  text:"First-Person-Shooters", active:false, stickyShow:true},
                                {type: "top", name: "RPG",  text:"Role Playing Games", active:false, stickyShow:false},
                                {type: "top", name: "MMO",  text:"Massively Multiplayer", active:false, stickyShow:false}
                            ],
                            authenticated:[

                            ]
                        },
                    }

                },
                {
                    name:'news',
                    pages:{
                        home:{
                            type:"image",
                            sorting:"second",
                            text:"News Portal",
                            abbreviation:"News",
                            href:'news',
                            portal:"news",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "find",  text:"Find", active:false, stickyShow:true},
                                {type: "top", name: "create",  text:"Create", active:false, stickyShow:true},
                                {type: "top", name: "archives",  text:"Archives", active:false, stickyShow:false}

                            ],
                            authenticated:[
                                {
                                    title: "Organization News",
                                    name: "org-news",
                                    active:false,
                                    stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Community News",
                                    name: "community-news",
                                    active:false,
                                    stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                                {
                                    title: "Hub News",
                                    name: "hub-news",
                                    active:false,
                                    stickyShow:true,
                                    links:[
                                        {type: "top", name: "all",  text:"All", active:false},
                                    ]
                                },
                            ]
                        },
                        target:{
                            type:"link",
                            name:"target",
                            portal:"news",
                            links:[

                            ],
                            authenticated:[

                            ]
                        },
                        create:{
                            type:"link",
                            name:"create",
                            text:"Create New",
                            href:'news/create',
                            portal:"news",
                            abbreviation:"Create",
                            active:false,
                            links:[
                                {type: "top", name: "add-section",  text:"Add Section", active:false, stickyShow:true},
                                {type: "top", name: "remove-sections",  text:"Remove Sections", active:false, stickyShow:true},
                                {type: "top", name: "submit",  text:"Submit", active:false, stickyShow:true},
                            ],
                            authenticated:[

                            ]
                        },
                        hub:{
                            type:"link",
                            name:"hub",
                            text:"Community Hub News",
                            href:'news/hub',
                            portal:"news",
                            abbreviation:"Hub",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "teams",  text:"Teams", active:false, stickyShow:true},
                                {type: "top", name: "organizations",  text:"Organizations", active:false, stickyShow:true},
                                {type: "top", name: "communities",  text:"Communities", active:false, stickyShow:true},
                                {type: "top", name: "hub",  text:"Hub", active:false, stickyShow:true},
                                {type: "top", name: "members",  text:"Members", active:false, stickyShow:true},
                            ],
                            authenticated:[

                            ]
                        },
                        overlord:{
                            type:"link",
                            name:"overlord",
                            text:"Overlord News",
                            href:'news/overlord',
                            portal:"news",
                            abbreviation:"Overlord",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "website",  text:"Website News", active:false, stickyShow:true},
                                {type: "top", name: "discord",  text:"Discord News", active:false, stickyShow:true}
                            ],
                            authenticated:[

                            ]
                        },
                        crypto:{
                            type:"link",
                            name:"crypto",
                            text:"Cryptocurrency News",
                            href:'news/crypto',
                            portal:"news",
                            abbreviation:"Crypto",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "stable-coins",  text:"Stable Coin News", active:false, stickyShow:true},
                                {type: "top", name: "pos-coins",  text:"Proof of Stake News", active:false, stickyShow:true},
                                {type: "top", name: "pow-coins",  text:"Proof of Work News", active:false, stickyShow:true}
                            ],
                            authenticated:[

                            ]
                        },
                        games:{
                            type:"link",
                            name:"gaming",
                            text:"Gaming News",
                            href:'news/gaming',
                            portal:"news",
                            abbreviation:"Gaming",
                            active:false,
                            links:[
                                {type: "top", name: "all",  text:"All", active:false, stickyShow:true},
                                {type: "top", name: "guildwars2",  text:"Guild Wars 2 News", active:false, stickyShow:true},
                                {type: "top", name: "starcitizen",  text:"Star Citizen News", active:false, stickyShow:true},
                                {type: "top", name: "pow-coins",  text:"Proof of Work News", active:false, stickyShow:true}
                            ],
                            authenticated:[

                            ]
                        },
                    }

                },
                {
                    name:"about",
                    pages:{
                        home:{
                            type:"image",
                            sorting:"second",
                            name:"about",
                            text:"Application Information",
                            href:'about',
                            portal:"about",
                            abbreviation:"about",
                            active:false,
                            links:[
                                {type: "top", name: "donate",  text:"Donate", active:false, stickyShow:true},
                                {type: "top", name: "creditedWork",  text:"Credited Work", active:false, stickyShow:false},
                                {type: "top", name: "overlordPopulation",  text:"Overlord Population", active:false, stickyShow:true},
                                {type: "top", name: "discordLinks",  text:"Discord Links", active:false, stickyShow:true}
                            ],
                            authenticated:[]
                        },
                        discord:{
                            type:"link",
                            name:"discord",
                            text:"Discord Information",
                            href:'about/discord',
                            portal:"about",
                            abbreviation:"Discord",
                            active:false,
                            links:[
                                {type: "top", name: "howTo",  text:"How to use the Bot", active:false, stickyShow:true},
                                {type: "top", name: "signin",  text:"Sign-In", active:false, stickyShow:true},
                                {type: "top", name: "deploy",  text:"Deploy", active:false, stickyShow:true},
                                {type: "top", name: "commands",  text:"Commands", active:false, stickyShow:true}
                            ],
                            authenticated:[]
                        },
                        faq:{
                            type:"link",
                            name:"faq",
                            text:"Questions & Answers",
                            href:'about/faq',
                            portal:"about",
                            abbreviation:"FAQ",
                            active:false,
                            links:[
                                {type: "top", name: "overlord",  text:"Overlord Questions", active:false, stickyShow:true},
                                {type: "top", name: "ai",  text:"Open AI", active:false, stickyShow:true},
                                {type: "top", name: "privacy",  text:"Privacy Questions", active:false, stickyShow:true}
                            ],
                            authenticated:[]
                        },
                        overlord:{
                            type:"link",
                            name:"overlord",
                            text:"About Overlord",
                            href:'about/overlord',
                            portal:"about",
                            abbreviation:"Overlord",
                            active:false,
                            links:[
                                {type: "top", name: "history",  text:"History of Overlord", active:false, stickyShow:true},
                                {type: "top", name: "team",  text:"Overlord Team", active:false, stickyShow:true},
                            ],
                            authenticated:[]
                        },
                        privacy:{
                            type:"link",
                            name:"privacy",
                            text:"Privacy Policy",
                            href:'about/privacy',
                            portal:"about",
                            abbreviation:"Privacy",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                        terms:{
                            type:"link",
                            name:"terms",
                            text:"Terms of Service",
                            href:'about/terms',
                            portal:"about",
                            abbreviation:"Terms",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                        contact:{
                            type:"link",
                            name:"contact",
                            text:"Contact Us",
                            href:'about/contact',
                            portal:"about",
                            abbreviation:"Contact",
                            active:false,
                            links:[],
                            authenticated:[]
                        },
                        crypto:{
                            type:"link",
                            name:"crypto",
                            text:"About Cryptocurrencies",
                            href:'about/guildwars',
                            portal:"about",
                            abbreviation:"Guildwars",
                            active:false,
                            links:[
                                {type: "top", name: "blockchains",  text:"The Blockchain Technology", active:false, stickyShow:true},
                                {type: "top", name: "why-we-believe",  text:"Why we believe", active:false, stickyShow:true}
                            ],
                            authenticated:[]
                        },
                        sitemap:{
                            type:"link",
                            name:"sitemap",
                            text:"Website Map",
                            href:'about/site-map',
                            portal:"about",
                            abbreviation:"Sitemap",
                            active:false,
                            links:[],
                            authenticated:[]
                        }
                    }
                },
                {
                    name:"home",
                    abbreviation:"Home",
                    sorting:"second",

                    text:"Home",
                    href:'home',
                    active:false,
                },
            ]
        }

    },
    template: `<div></div>`,
    created(){
        let self = this;
        console.log("Dashboard Created.");
        self.configAuth();

    },
    computed: {
        computedInterface: function(){
            if(this.location.main === null)  return this.interfaces["home"];
            return this.interfaces[this.location.main];
        },
        computedSubLinks: function(){
            for(let x= 0; x < this.links.length; x++){
                if(this.links[x].name === this.location.main) return this.links[x].pages;
            }
        },
        computedBtn: function () {
            switch(this.location.main){
                case"hub": return "guild-";
                case"news":  return "blog-";
                case"crypto": return "builds-";
                case"games": return "wvw-";
                case"discord": return "admin-";
                case"about":return "raid-";
                default: return null;
            }
        },
        computedTitle: function(){
            switch(this.location.main){
                case'hub': return "Overlord Hub";
                case'news': return "News Portal";
                case'about': return "Overlord Information";
                case'crypto': return "Crypto Portal";
                case'games': return "Gaming Portal";
                case'discord': return "Discord Portal";
                default: return "OverLord";
            }
        }
    },
    methods: {
        jsUcFirst(text) {return String(text).charAt(0).toUpperCase() + String(text).slice(1);},
        hudState(change){
            this.hudControls[change.hud + 'Hud'] = change.action;
        },
        updateSearch(string){
            console.log(`Searching for '${string}'.`);
            this.hudControls.search = string;
            // Run Search.
        },
        disableMainLinks(){
            this.links.forEach((link) => {
                if (link.name === "home") link.active = false;
                else link.pages.home.active = false
            })
        },
        disableSubLinks(){
            this.links.forEach((link) => {
                if (link.name !== "home" || "login"){
                    for (let key in link.pages) {
                        if (Object.prototype.hasOwnProperty.call(link.pages, key)) {
                            if(key !== "home")link.pages[key].active = false;
                        }
                    }
                }
            });
        },
        disableSideLinks(){
            this.links.forEach((link) => {
                if (link.name !== "home" || "login"){
                    for (let key in link.pages) {
                        if (Object.prototype.hasOwnProperty.call(link.pages, key)) {
                            link.pages[key].links.forEach((sideLink) => sideLink.active = false);
                        }
                    }
                }
            });
        },

        configAuth() {
            let message;

            if (self.user) {
                if(self.user.data){
                    self.user.data = JSON.parse(self.user.data);
                    message = "User data found.";
                    self.authTeamsLinks();
                    self.authOrganizationsLinks();
                    self.authCommunitiesLinks();
                }
                else message = "No user data found.";
            }
            else message = "No user data found.";

            console.log(message);



        },
        authTeamsLinks(){

        },

        authOrganizationsLinks(){

        },

        authCommunitiesLinks(){

        },

        /**
         * http://www.overlord.com/[main]/[sub]/[target]
         * @param request */
        async updateLocation(request){
            let self = this;
            let mainTitle = self.jsUcFirst(request.title);
            let subTitle, url, id;

            // If request has no sub, set to a home link.
            if(request.sub === null){
                subTitle = self.jsUcFirst(request.main);

                // If request has target, set target.
                if(request.target !== null){
                    url = self.location.host + request.main + '/' + request.target;
                    id = `${request.main}-${request.target}`
                }

                // If request has no target, set to the home page.
                else{
                    url = self.location.host + request.main;
                    id = `${request.main}-home`
                }

            }
            // If request has sub, set sub.
            else {
                subTitle = self.jsUcFirst(request.sub);

                // If request has target, set target.
                if(request.target !== null){
                    url = self.location.host + request.main + '/' + request.sub + '/' + request.target;
                    id = `${request.sub}-${request.target}`
                }

                // If request has no target, set to the home page.
                else{
                    url = self.location.host + request.main + '/' + request.sub;
                    id = `${request.main}-${request.sub}`
                }

            }

            // Set the location.
            history.pushState({id: id}, `${mainTitle} | ${subTitle}`, url);

            self.location.sub = request.sub;
            self.location.target = request.target;
            self.location.main = request.main;

            // Unsets the active links.
            self.disableMainLinks();
            self.disableSubLinks();
            self.disableSideLinks();

            // Sets the active links.
            self.links.forEach((link) => {
                if(link.name === request.main){
                    if(request.main === 'home') link.active = true;
                    else link.pages.home.active = true;
                }

                else{
                    if(link.name === 'home') link.active = false;
                    else link.pages.home.active = false;
                }

            });

            // If request has no sub, set Title this way.
            if(self.location.sub !== null){
                $(document).prop('title', 'Overlord | ' + self.jsUcFirst(self.location.main) + ' | ' + self.jsUcFirst(self.location.sub));
            }
            // If request has sub, set Title this way.
            else{
                if(self.location.target === null) $(document).prop('title', 'Overlord | ' + self.jsUcFirst(self.location.main));
                else $(document).prop('title', `Overlord | ${self.jsUcFirst(self.location.main)} | ${self.jsUcFirst(self.location.target)}`);
            }
        },
    },

}
window.vDashboard = Vue.createApp(App).mount("#dash");
