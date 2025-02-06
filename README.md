# pmjones/starter

First, clone the starter:

```
git clone git@github.com:pmjones/starter $PROJECT_DIR
cd $PROJECT_DIR
rm -rf .git
```

Then issue the following command ...

```
php bin/start.sh $VENDOR $PACKAGE $NAMESPACE
```

... replacing the variables with your chosen values. For example:

```
php bin/start.sh vendor-name package-name VendorName\\PackageName
```
