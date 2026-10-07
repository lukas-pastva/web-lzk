// Presmerovanie starych PHP URL (site.php?x=..&id=..) na staticke cesty, aby fungovali stare odkazy.
const XMAP = { '10': 'hip-hop', '20': 'ex-sports', '30': 'forum', '31': 'forum', '2': 'xtm', '11': 'write', '12': 'sketches', '13': 'stickers',
  '21': 'sk8', '22': 'bike', '23': 'snb', '41': 'dasemolinaxi', '42': 'dasemolina-theend', '43': 'martin', '44': 'jamza', '45': 'hip-hopsummit1',
  '46': 'hip-hopsummit3', '47': 'notakdavaj3', '48': 'ca2', '49': 'hip-hop_fest', '50': 'ca4', '60': 'haluze' };

export async function onRequest({ request, next }) {
  const url = new URL(request.url);
  if (url.pathname === '/index.php') return Response.redirect(url.origin + '/', 301);
  if (url.pathname === '/site.php') {
    const x = url.searchParams.get('x') || '0';
    let target = '/';
    if (x === '1' && /^\d+$/.test(url.searchParams.get('id') || '')) target = `/clanok/${url.searchParams.get('id')}/`;
    else if (XMAP[x]) target = `/${XMAP[x]}/`;
    return Response.redirect(url.origin + target, 301);
  }
  return next();
}
