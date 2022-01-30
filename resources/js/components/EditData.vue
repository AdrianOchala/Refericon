<template>
    <div class="form">
        <div class="form__title">Edytuj dane dla pilotażu</div>
        <label for="people">Liczba osób</label>
        <input  type="number" 
                pattern="[0-9]+([\.][0-9]+)?" 
                id="people" 
                name="people" 
                v-model="pilotage.people" 
                @input="countPrice('people')"
        >
        <label for="price">Cena za 1 osobę (PLN)</label>
        <input  type="number" 
                pattern="[0-9]+([\.][0-9]+)?" 
                id="price" 
                name="price" 
                v-model="pilotage.pricePerPerson" 
                @input="countPrice('price')"
        >
        <label for="priceMonthly">Cena miesięcznie (PLN)</label>
        <input  type="number" 
                pattern="[0-9]+([\.][0-9]+)?" 
                id="priceMonthly" 
                name="priceMonthly" 
                v-model="pilotage.priceMonthly" 
                @input="countPrice('priceMonthly')"
        >
        <div v-if="error !== null" :class="error ? 'form__error failed' : 'form__error success'">
            <span v-if="!error">Pomyślnie zaktualizowano dane :)</span>
            <span v-else-if="error">Niepowodzenie przy aktualizacji danych!</span>
        </div>
        <div class="buttons--center">
            <button class="button--orange" @click="updateInfo()">Zapisz</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pilotage:{
                id: null,
                people: null,
                pricePerPerson: null,
                priceMonthly: null
            },
            error: null,
        }
    },
    mounted(){
        this.getInfo();
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
        updateInfo(){
            axios.post('api/pilotage', this.pilotage)
                .then(res => {
                    res.status === 200 ? this.error = false : this.error = true;
                })
                .catch(error => {
                    this.error = true;
                })
        },
        countPrice(type){
            switch(type){
                case 'priceMonthly':
                case 'people':
                    this.pilotage.pricePerPerson = this.pilotage.priceMonthly / this.pilotage.people;
                    break;
                case 'price':
                    this.pilotage.priceMonthly = this.pilotage.people * this.pilotage.pricePerPerson;
                    break;
            }
        }
    }
}
</script>
