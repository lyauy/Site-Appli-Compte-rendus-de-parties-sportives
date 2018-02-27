/* eslint-disable */
var settings = {
    allowFuture: true,
    prefixAgo: null,
    prefixFromNow: null,
    numbers: [],
    suffixAgo: '',
    suffixFromNow: 'maintenant',
    seconds: "il y a moins d'une minute",
    minute: 'il y a 1 minute',
    minutes: 'il y a %d minutes',
    hour: 'il y a 1 heure',
    hours: 'il y a %d heures',
    day: 'il y a 1 jour',
    days: 'il y a %d jours',
    month: 'il y a 1 mois',
    months: 'il y a %d mois',
    year: 'il y a 1 an',
    years: 'il y a %d ans'
};

function timeAgo (since, until) {
    if (since == null) since = new Date()
    if (until == null) until = new Date()

    return inWords(until.getTime() - since.getTime())
}

function substitute (string, number) {
    var value
    value = (settings.numbers && settings.numbers[number]) || number
    return string.replace(/%d/i, value)
}

function inWords (distanceMillis) {
    var years, days, hours, minutes, prefix, seconds, suffix, words
    prefix = settings.prefixAgo
    suffix = settings.suffixAgo

    if (settings.allowFuture) {
        if (distanceMillis < 0) {
            prefix = settings.prefixFromNow
            suffix = settings.suffixFromNow
        }
    }

    seconds = Math.abs(distanceMillis) / 1000
    minutes = seconds / 60
    hours = minutes / 60
    days = hours / 24
    years = days / 365
    words = seconds < 45 && substitute(settings.seconds, Math.round(seconds)) ||
            seconds < 90 && substitute(settings.minute, 1) ||
            minutes < 45 && substitute(settings.minutes, Math.round(minutes)) ||
            minutes < 90 && substitute(settings.hour, 1) ||
            hours < 24 && substitute(settings.hours, Math.round(hours)) ||
            hours < 48 && substitute(settings.day, 1) ||
            days < 30 && substitute(settings.days, Math.floor(days)) ||
            days < 60 && substitute(settings.month, 1) ||
            days < 365 && substitute(settings.months, Math.floor(days / 30)) ||
            years < 2 && substitute(settings.year, 1) ||
            substitute(settings.years, Math.floor(years))

    return [prefix, words, suffix].join(' ').toString().trim()
}

export default function (value) {
  let date = new Date(value)
  let timezone = date.getTimezoneOffset()
  return timeAgo(new Date(date.getTime() - timezone * 1000 * 60))
}
