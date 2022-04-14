import Swal from 'sweetalert2'

const currencies = {
  namespaced: true,
  state: () => ({
    currency_id: 1,
    currency: {
      id: null,
      name: null,
      short_name: null
    },
    all_currencies: [],
    last_update: null
  }),

  mutations: {
    // Работы с инициализацией когда взяли валюту из сервера
    initialCurrencies (state, payload) {
      let currency = payload.currencies.find(el => el.default)
      state.all_currencies = payload.currencies
      state.currency = currency
      state.currency_id = currency.id
      state.last_update = new Date();
    }
  },

  actions: {
    // Запрос к сайту на взятие валют и выбор в дефолтную
    initial ({ commit, dispatch }) {
      axios.get('/api/currencies')
        .then(r => {
          commit('initialCurrencies', r.data.payload)
        })
        .catch((e) => {
          console.warn(e)
          if (e instanceof Error) {
            Swal.fire({
              title: 'Ошибка загрузки данных валют',
              html: e.message + '<br> <br> Обратитесь к администратору сайта',
              icon: 'error',
              allowOutsideClick: false,
              confirmButtonText: 'Перезагрузить'
            })
              .then(v => {
                if (v.isConfirmed) {
                  Swal.fire({
                    title: 'Ожидайте',
                    html: 'Подключение к серверу',
                    timer: 1500,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timerProgressBar: true,
                  })
                    .then((result) => {
                      if (result.dismiss === Swal.DismissReason.timer) {
                        dispatch('initial')
                      }
                    })
                }
              })
          }
        })
    }
  }
}

export default currencies