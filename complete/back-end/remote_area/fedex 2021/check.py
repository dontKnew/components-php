import pycountry

if 'USA' in [c.name for c in pycountry.countries]:
    print('USA is a country')
else:
    print('USA is not a country')
