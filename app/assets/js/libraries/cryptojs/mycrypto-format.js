let CryptoJSAesJson={stringify:function(t){let e={ct:t.ciphertext.toString(CryptoJS.enc.Base64)};return t.iv&&(e.iv=t.iv.toString()),t.salt&&(e.s=t.salt.toString()),JSON.stringify(e).replace(/\s/g,"")},parse:function(t){let e=JSON.parse(t),r=CryptoJS.lib.CipherParams.create({ciphertext:CryptoJS.enc.Base64.parse(e.ct)});return e.iv&&(r.iv=CryptoJS.enc.Hex.parse(e.iv)),e.s&&(r.salt=CryptoJS.enc.Hex.parse(e.s)),r}};