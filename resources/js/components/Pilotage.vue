<template>
    <div class="pilotage">
        <div class="pilotage__steps">Pilotaż - krok po kroku</div>
        <div class="pilotage__info">
            <div class="cost">
                <div class="cost__choice">
                    <div class="cost__choice--title">Cena za wybrany pakiet</div>
                    <div class="buttons">
                        <button class="button--orange">Miesięcznie</button>
                        <button class="button--gray-outlined">Rocznie</button>
                    </div>
                </div>
                <div class="cost__money">
                    <div class="buttons--center">
                        <button class="button--orange-pale">Miesięcznie</button>
                    </div>
                    <p>880 PLN</p>
                    <p>Kalkulacja dla 20 użytkowników</p>
                    <p>44 PLN / osoba</p>
                </div>
            </div>
            <div class="details">
                <div class="details__title">
                    Platforma
                </div>
                <div class="details__action">
                    <button class="button--big">Start (pilotaż)</button>
                </div>   
            </div>
            <div class="details__container">
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
                        <span v-else>{{platform.option}} &nbsp;<span v-if="index == 0">{{pilotage.users}}</span></span>
                    </div>
                </div>
            </div>
            <div class="details" style="margin-top: 4rem;">
                <div class="details__title">
                    Zaangażowanie
                </div>
            </div>
            <div class="details__row" v-for="(involvement, id) in involvements" :key="'I'+id">
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
</template>

<script>
import info from '../../images/tooltip.svg';
    export default {
        data(){
            return {
                pilotage:{
                    users: 20,
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
            console.log('Component mounted.')
        }
    }
</script>
