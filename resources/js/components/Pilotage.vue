<template>
    <div class="pilotage">
        <div class="pilotage__steps">Pilotaż - krok po kroku</div>
        <div class="pilotage__info">
            <div class="cost">
                <div class="cost__choice">
                    <div class="cost__choice--title">Cena za wybrany pakiet</div>
                    <div class="buttons">
                        <button :class="priceType === 'Monthly' ? 'button--orange' : 'button--gray-outlined'" 
                                @click="changePrice('Monthly')">Miesięcznie</button>
                        <button :class="priceType === 'Yearly' ? 'button--orange' : 'button--gray-outlined'" 
                                @click="changePrice('Yearly')">Rocznie</button>
                    </div>
                </div>
                <div class="cost__money">
                    <div class="buttons--center">
                        <button class="button--orange-pale" v-if="priceType === 'Monthly'">Miesięcznie</button>
                        <button class="button--orange-pale" v-else>Rocznie</button>
                    </div>
                    <p>{{pilotage.priceMonthly}} PLN</p>
                    <p>Kalkulacja dla {{pilotage.people}} użytkowników</p>
                    <p>{{pilotage.pricePerPerson}} PLN / osoba</p>
                </div>
            </div>
            <div class="details">
                <div class="details__title" id="platform">
                    Platforma &nbsp;
                    <font-awesome-icon v-if="showPlatform" icon="chevron-up"></font-awesome-icon>
                    <font-awesome-icon v-else icon="chevron-down"></font-awesome-icon>
                </div>
                <div class="details__action">
                    <button class="button--big">Start (pilotaż)</button>
                </div>   
            </div>
            <div class="details__container" id="platformRow">
                <div class="details__row" v-for="(platform, index) in platforms" :key="'P'+index">
                    <div class="details__name">
                        {{platform.name}} &nbsp;
                        <div v-if="platform.tooltip" class="customtooltip">
                            <img  src="/images/tooltip.svg" alt="tooltip"/>
                            <span class="customtooltip__text">{{platform.tooltipText}}</span>
                        </div>
                    </div>
                    <div class="details__option">
                        <span v-if="platform.option == true"><font-awesome-icon icon="check-circle" :style="{color: '#64CA8D'}" ></font-awesome-icon> Tak </span>
                        <span v-else-if="platform.option == false"><font-awesome-icon icon="times-circle" :style="{color: 'red'}" ></font-awesome-icon> Nie </span>
                        <span v-else>{{platform.option}} &nbsp;<span v-if="index == 0">{{pilotage.people}}</span></span>
                    </div>
                </div>
            </div>
            <div class="details" id="involvement">
                <div class="details__title">
                    Zaangażowanie &nbsp;
                    <font-awesome-icon v-if="showInvolvements" icon="chevron-up"></font-awesome-icon>
                    <font-awesome-icon v-else icon="chevron-down"></font-awesome-icon>
                </div>
            </div>
            <div class="details__container">
                <div class="details__row" id="involvementRow" v-for="(involvement, id) in involvements" :key="'I'+id">
                    <div class="details__name">
                        {{involvement.name}}&nbsp;
                        <div v-if="involvement.tooltip" class="customtooltip">
                                <img  src="/images/tooltip.svg" alt="tooltip"/>
                                <span class="customtooltip__text">{{involvement.tooltipText}}</span>
                            </div>
                    </div>
                    <div class="details__option">
                        <span v-if="involvement.option == true"><font-awesome-icon icon="check-circle" :style="{color: '#64CA8D'}" ></font-awesome-icon> Tak </span>
                        <span v-else-if="involvement.option == false"><font-awesome-icon icon="times-circle" :style="{color: 'red'}" ></font-awesome-icon> Nie </span>
                        <span v-else>{{involvement.option}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                priceType: 'Monthly',
                showPlatform: false,
                showInvolvements: false,
                pilotage:{
                    id: null,
                    people: null,
                    pricePerPerson: null,
                    priceMonthly: null
                },
                platforms:[
                    {
                        name: 'Liczba użytkowników',
                        option: 'do '
                    },
                    {
                        name: 'Nielimitowany dostęp do kilkuset seriali rozwojowych video oraz podcastów. (Nowy kontent minimum co 2 tygodnie)',
                        option: true
                    },
                    {
                        name: 'Dostęp na każdym urządzeniu - WWW, Aplikacja mobilna (Android, iOS)',
                        option: true
                    },
                    {
                        name: 'Spersonalizowane ścieżki rozwojowe',
                        option: true
                    },
                    {
                        name: 'Quizy, testy wiedzy, zadania domowe, notatki, lessons learned',
                        option: true
                    },
                    {
                        name: 'Egzaminy i certyfikaty',
                        option: true,
                        tooltip: true,
                        tooltipText: 'Lorem ipsum jest tekstem stosowanym jako przykład w przemyśle typograficznym.'
                    },
                    {
                        name: 'Tworzenie indywidualnych ścieżek do programów rozwojowych organizacji',
                        option: 'rekomendowana ścieżka rozwojowa'
                    },
                    {
                        name: 'Onboarding użytkowników',
                        option: 'dedykowany'
                    }
                ],
                involvements: [
                    {
                        name: 'Komunikacja oraz narzędzia budowania zaangażowania',
                        option: 'spersonalizowane'
                    },
                    {
                        name: 'Dedykowany Project Manager',
                        option: true,
                        tooltip: true,
                        tooltipText: 'Lorem ipsum jest tekstem stosowanym jako przykład w przemyśle typograficznym.'
                    },
                    {
                        name: 'KICK OFF Event',
                        option: true
                    },
                    {
                        name: 'Raporty zaangażowania użytkowników',
                        option: 'spersonalizowane'
                    }
                ]
            }
        },
        mounted() {
            this.getInfo();

            let platform = document.getElementById('platform');
            let involvement = document.getElementById('involvement');

            platform.addEventListener('click', () => {
                let content = document.getElementById('platformRow');
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    this.showPlatform       = false;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    this.showPlatform       = true;
                }
            });
            involvement.addEventListener('click', () => {
                let content = involvement.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    this.showInvolvements   = false;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    this.showInvolvements   = true;
                }
            });
        },
        methods:{
            getInfo(){
                axios.get('api/pilotage')
                    .then(res => {
                        this.pilotage.id                = res.data.id;
                        this.pilotage.people            = res.data.people;
                        this.pilotage.pricePerPerson    = res.data.pricePerPerson;
                        this.pilotage.priceMonthly      = res.data.priceMonthly;
                    })
            },
            changePrice(type){
                if(type != this.priceType){
                    this.priceType = type;
                    switch(type){
                        case 'Monthly':
                            this.pilotage.priceMonthly      /= 12;
                            this.pilotage.pricePerPerson    /= 12;
                            break;
                        case 'Yearly':
                            this.pilotage.priceMonthly      *= 12;
                            this.pilotage.pricePerPerson    *= 12;
                            break;
                    }
                }
            }
        }
    }
</script>
