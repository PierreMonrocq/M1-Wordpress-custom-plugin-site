
jQuery(".datepicker").flatpickr({locale: {
    firstDayOfWeek: 1,
    weekdays: {
      shorthand: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
      longhand: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],         
    }, 
    months: {
      shorthand: ['Janv.', 'Févr.', 'Mars', 'Avr.', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
      longhand: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    },
  },

minDate: "today",dateFormat: "d M Y",})
jQuery(".heurepicker").flatpickr(
    {enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true})